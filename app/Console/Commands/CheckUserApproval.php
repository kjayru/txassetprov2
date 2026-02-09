<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckUserApproval extends Command
{
    protected $signature = 'check:user-approval {email} {course_id}';
    protected $description = 'Verifica si un usuario aprobó un curso';

    public function handle()
    {
        $email = $this->argument('email');
        $courseId = $this->argument('course_id');

        $this->info("========================================");
        $this->info("VERIFICACIÓN DE APROBACIÓN DE CURSO");
        $this->info("========================================\n");

        try {
            // Buscar usuario con query directo
            $user = DB::table('users')->where('email', $email)->first();

            if (!$user) {
                $this->error("❌ Usuario NO encontrado con email: $email");
                return 1;
            }

            $this->info("👤 USUARIO ENCONTRADO:");
            $this->line("   ID: {$user->id}");
            $this->line("   Nombre: {$user->name}");
            $this->line("   Email: {$user->email}\n");

            // Buscar inscripción al curso
            $userCourse = DB::table('user_courses')
                            ->where('user_id', $user->id)
                            ->where('course_id', $courseId)
                            ->first();

            if (!$userCourse) {
                $this->error("❌ El usuario NO está inscrito en el curso ID: $courseId");
                return 1;
            }

            $this->info("📚 INSCRIPCIÓN AL CURSO:");
            $this->line("   User Course ID: {$userCourse->id}");
            $this->line("   Course ID: {$userCourse->course_id}");

            $curso = DB::table('courses')->where('id', $courseId)->first();
            if ($curso) {
                $this->line("   Título: {$curso->titulo}");
            }

            $this->newLine();
            $this->info("✅ ESTADO DE APROBACIÓN:");
            
            if ($userCourse->aprobado == 1) {
                $this->line("   Aprobado: <fg=green>✅ SÍ (1)</>");
            } else {
                $this->line("   Aprobado: <fg=red>❌ NO (0)</>");
            }
            
            $this->line("   Intentos fallidos: {$userCourse->intentos}");
            $this->line("   Fecha inscripción: {$userCourse->created_at}");
            $this->line("   Última actualización: {$userCourse->updated_at}\n");

            // Verificar si tomó el examen
            $examCourse = DB::table('exam_courses')->where('course_id', $courseId)->first();

            if ($examCourse) {
                $this->info("📝 EXAMEN FINAL:");
                $this->line("   Exam ID: {$examCourse->exam_id}");
                
                $userExam = DB::table('user_course_exams')
                              ->where('user_course_id', $userCourse->id)
                              ->where('exam_id', $examCourse->exam_id)
                              ->first();
                
                if ($userExam) {
                    $this->line("   Completado: " . ($userExam->complete == 1 ? 'SÍ' : 'NO'));
                    $this->line("   Intentos examen: {$userExam->intentos}");
                    $this->line("   Tiempo usado: {$userExam->tiempo} segundos");
                    
                    // Calcular porcentaje
                    $totalPreguntas = DB::table('exam_questions')
                                        ->where('exam_id', $examCourse->exam_id)
                                        ->count();
                    
                    $respuestasCorrectas = DB::table('user_course_exam_results')
                                             ->where('user_course_exam_id', $userExam->id)
                                             ->where('result', 1)
                                             ->count();
                    
                    $totalRespuestas = DB::table('user_course_exam_results')
                                         ->where('user_course_exam_id', $userExam->id)
                                         ->count();
                    
                    if ($totalPreguntas > 0) {
                        $porcentaje = round(($respuestasCorrectas * 100) / $totalPreguntas, 2);
                        $this->newLine();
                        $this->info("   📊 RESULTADOS DEL EXAMEN:");
                        $this->line("   Total preguntas: {$totalPreguntas}");
                        $this->line("   Total respondidas: {$totalRespuestas}");
                        $this->line("   Respuestas correctas: {$respuestasCorrectas}");
                        $this->line("   Porcentaje: {$porcentaje}%");
                        $this->line("   Umbral aprobación: 75%");
                        
                        if ($porcentaje >= 75) {
                            $this->line("   Estado examen: <fg=green>✅ APROBADO</>");
                        } else {
                            $this->line("   Estado examen: <fg=red>❌ REPROBADO</>");
                        }
                    }
                } else {
                    $this->warn("   ⚠️  No hay registro de examen tomado");
                }
            } else {
                $this->warn("⚠️  No hay examen configurado para este curso");
            }

            $this->newLine();
            $this->info("========================================");
            $this->info("CONCLUSIÓN: ");
            
            if ($userCourse->aprobado == 1) {
                $this->line("<fg=green>✅ EL USUARIO SÍ APROBÓ EL CURSO</>");
            } else {
                $this->line("<fg=red>❌ EL USUARIO NO HA APROBADO EL CURSO</>");
            }
            
            $this->info("========================================");

            return 0;
            
        } catch (\Exception $e) {
            $this->error("\n❌ ERROR: " . $e->getMessage());
            $this->error("Línea: " . $e->getLine());
            $this->error("Archivo: " . $e->getFile());
            return 1;
        }
    }
}
