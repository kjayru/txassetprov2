<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserCourse;
use App\Models\User;
use App\Models\Course;
use App\Models\UserCourseExam;
use App\Models\UserCourseExamResult;
use App\Models\ExamCourse;
use App\Models\ExamQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FixApprovedCourses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'courses:fix-approved {--user-course-id= : Specific user_course_id to fix} {--auto-fix : Automatically fix all cases without confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix user courses that have >= 75% but are marked as not approved (aprobado=0)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🔍 Buscando cursos con porcentaje >= 75% pero marcados como NO aprobados...');
        $this->newLine();

        // Si se especifica un user_course_id específico
        if ($userCourseId = $this->option('user-course-id')) {
            return $this->fixSpecificUserCourse($userCourseId);
        }

        // Buscar todos los casos problemáticos
        $casos = $this->findProblemCases();

        if ($casos->isEmpty()) {
            $this->info('✅ No se encontraron casos para corregir.');
            return 0;
        }

        $this->warn("⚠️  Se encontraron {$casos->count()} casos que necesitan corrección:");
        $this->newLine();

        // Mostrar tabla con los casos
        $this->table(
            ['ID', 'Usuario', 'Email', 'Curso', 'Porcentaje', 'Aprobado', 'Caducado'],
            $casos->map(function ($caso) {
                return [
                    $caso->user_course_id,
                    $caso->usuario_nombre,
                    $caso->usuario_email,
                    $caso->curso_titulo,
                    $caso->porcentaje . '%',
                    $caso->aprobado ? '✅' : '❌',
                    $caso->caducado ? '⏰' : '-'
                ];
            })
        );

        if (!$this->option('auto-fix') && !$this->confirm('¿Deseas corregir estos registros?', true)) {
            $this->info('Operación cancelada.');
            return 0;
        }

        // Corregir cada caso
        $corregidos = 0;
        foreach ($casos as $caso) {
            if ($this->fixUserCourse($caso->user_course_id, $caso->porcentaje)) {
                $corregidos++;
                $this->info("✅ Corregido: {$caso->usuario_nombre} - {$caso->curso_titulo}");
            }
        }

        $this->newLine();
        $this->info("✅ Proceso completado. Se corrigieron {$corregidos} de {$casos->count()} casos.");
        
        return 0;
    }

    /**
     * Find all user courses with >= 75% but aprobado = 0
     * IMPORTANTE: Solo cuenta el ÚLTIMO registro por pregunta para evitar contar múltiples intentos
     */
    private function findProblemCases()
    {
        // Obtener todos los user_courses con exámenes completados
        $userCourses = DB::table('user_courses as uc')
            ->join('users as u', 'u.id', '=', 'uc.user_id')
            ->join('courses as c', 'c.id', '=', 'uc.course_id')
            ->join('user_course_exams as uce', 'uce.user_course_id', '=', 'uc.id')
            ->where('uc.aprobado', 0)
            ->where('uce.complete', 1)
            ->select(
                'uc.id as user_course_id',
                'uce.id as user_course_exam_id',
                'u.name as usuario_nombre',
                'u.email as usuario_email',
                'c.id as course_id',
                'c.titulo as curso_titulo',
                'uc.aprobado',
                'uc.caducado'
            )
            ->get()
;

        // Filtrar los que tienen >= 75%
        $problemCases = [];
        foreach ($userCourses as $uc) {
            $porcentaje = $this->calculatePercentage($uc->user_course_id);
            if ($porcentaje !== null && $porcentaje >= 75.00) {
                $uc->porcentaje = $porcentaje;
                $problemCases[] = $uc;
            }
        }

        // Ordenar por porcentaje descendente
        usort($problemCases, function($a, $b) {
            return $b->porcentaje <=> $a->porcentaje;
        });

        return collect($problemCases);
    }

    /**
     * Fix a specific user course
     */
    private function fixSpecificUserCourse($userCourseId)
    {
        $userCourse = UserCourse::find($userCourseId);

        if (!$userCourse) {
            $this->error("❌ UserCourse ID {$userCourseId} no encontrado.");
            return 1;
        }

        $this->info("📋 Analizando UserCourse ID: {$userCourseId}");
        $this->info("   Usuario: {$userCourse->user->name} ({$userCourse->user->email})");
        $this->info("   Curso: {$userCourse->course->titulo}");

        // Calcular porcentaje
        $porcentaje = $this->calculatePercentage($userCourseId);

        if ($porcentaje === null) {
            $this->error("❌ No se pudo calcular el porcentaje. El usuario puede no haber completado el examen.");
            return 1;
        }

        $this->info("   Porcentaje obtenido: {$porcentaje}%");
        $this->info("   Estado actual: aprobado=" . ($userCourse->aprobado ? '1' : '0'));

        if ($porcentaje >= 75 && $userCourse->aprobado == 0) {
            $this->warn("   ⚠️  Requiere corrección (>= 75% pero aprobado=0)");
            
            if ($this->confirm('¿Deseas corregir este registro?', true)) {
                if ($this->fixUserCourse($userCourseId, $porcentaje)) {
                    $this->info("✅ Registro corregido exitosamente.");
                    return 0;
                } else {
                    $this->error("❌ Error al corregir el registro.");
                    return 1;
                }
            }
        } else {
            $this->info("✅ El registro está correcto. No requiere cambios.");
        }

        return 0;
    }

    /**
     * Calculate percentage for a user course
     * Usa attempt_number para contar solo el último intento
     */
    private function calculatePercentage($userCourseId)
    {
        $userCourse = UserCourse::find($userCourseId);
        $exam = UserCourseExam::where('user_course_id', $userCourseId)->where('complete', 1)->first();

        if (!$exam) {
            return null;
        }

        // Obtener el último número de intento
        $ultimo_intento = $exam->intentos > 0 ? $exam->intentos : 1;

        // Contar respuestas correctas solo del último intento
        $totalCorrect = DB::table('user_course_exam_results')
            ->where('user_course_exam_id', $exam->id)
            ->where('attempt_number', $ultimo_intento)
            ->where('result', 1)
            ->count();

        $examCourse = ExamCourse::where('course_id', $userCourse->course_id)->first();
        if (!$examCourse) {
            return null;
        }

        $totalQuestions = ExamQuestion::where('exam_id', $examCourse->exam_id)->count();

        if ($totalQuestions == 0) {
            return null;
        }

        return round(($totalCorrect * 100) / $totalQuestions, 2);
    }

    /**
     * Fix a user course record
     */
    private function fixUserCourse($userCourseId, $porcentaje)
    {
        try {
            $userCourse = UserCourse::find($userCourseId);
            
            $userCourse->aprobado = 1;
            $userCourse->finalizado = 1;
            $userCourse->caducado = 0; // Resetear caducidad si estaba marcado
            $userCourse->save();

            Log::info("UserCourse {$userCourseId} corregido de aprobado=0 a aprobado=1 (Porcentaje: {$porcentaje}%)");

            return true;
        } catch (\Exception $e) {
            Log::error("Error al corregir UserCourse {$userCourseId}: " . $e->getMessage());
            return false;
        }
    }
}
