<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AssignAttemptNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exams:assign-attempt-numbers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asigna números de intento a registros existentes en user_course_exam_results';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🔄 Asignando números de intento a registros históricos...');
        
        // Obtener todos los user_course_exam_id únicos
        $examIds = DB::table('user_course_exam_results')
            ->select('user_course_exam_id')
            ->distinct()
            ->get();

        $this->info("   Encontrados " . $examIds->count() . " exámenes con respuestas.");
        
        $bar = $this->output->createProgressBar($examIds->count());
        $bar->start();

        $totalUpdated = 0;

        foreach ($examIds as $exam) {
            // Obtener el número de intentos del examen
            $userCourseExam = DB::table('user_course_exams')
                ->where('id', $exam->user_course_exam_id)
                ->first();

            if (!$userCourseExam) {
                $bar->advance();
                continue;
            }

            // Obtener todas las respuestas agrupadas por pregunta con su created_at
            $questions = DB::table('user_course_exam_results')
                ->where('user_course_exam_id', $exam->user_course_exam_id)
                ->select('exam_question_id', 'id', 'created_at')
                ->orderBy('exam_question_id')
                ->orderBy('created_at')
                ->get();

            // Agrupar por pregunta y asignar número de intento
            $grouped = $questions->groupBy('exam_question_id');
            
            foreach ($grouped as $questionId => $answers) {
                $attemptNum = 1;
                foreach ($answers as $answer) {
                    DB::table('user_course_exam_results')
                        ->where('id', $answer->id)
                        ->update(['attempt_number' => $attemptNum]);
                    $attemptNum++;
                    $totalUpdated++;
                }
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("✅ Se asignaron números de intento a {$totalUpdated} registros.");
        
        // Agregar índice si no existe
        $this->info("🔄 Verificando índice...");
        
        $indexes = DB::select("SHOW INDEX FROM user_course_exam_results WHERE Key_name = 'ucer_exam_attempt_idx'");
        
        if (empty($indexes)) {
            $this->info("   Creando índice ucer_exam_attempt_idx...");
            DB::statement("ALTER TABLE user_course_exam_results ADD INDEX ucer_exam_attempt_idx (user_course_exam_id, attempt_number)");
            $this->info("   ✅ Índice creado.");
        } else {
            $this->info("   ✅ Índice ya existe.");
        }

        $this->newLine();
        $this->info("🎉 Proceso completado exitosamente.");

        return 0;
    }
}
