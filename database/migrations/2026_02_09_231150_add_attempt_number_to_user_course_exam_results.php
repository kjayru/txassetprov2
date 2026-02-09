<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddAttemptNumberToUserCourseExamResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_course_exam_results', function (Blueprint $table) {
            $table->integer('attempt_number')->default(1)->after('user_course_exam_id');
            $table->index(['user_course_exam_id', 'attempt_number'], 'ucer_exam_attempt_idx');
        });

        // Actualizar registros existentes con su número de intento correcto
        $this->assignAttemptNumbers();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_course_exam_results', function (Blueprint $table) {
            $table->dropIndex('ucer_exam_attempt_idx');
            $table->dropColumn('attempt_number');
        });
    }

    /**
     * Asignar números de intento a los registros existentes basándose en created_at
     */
    private function assignAttemptNumbers()
    {
        // Obtener todos los user_course_exam_id únicos
        $examIds = DB::table('user_course_exam_results')
            ->select('user_course_exam_id')
            ->distinct()
            ->get();

        foreach ($examIds as $exam) {
            // Obtener el número de intentos del examen
            $userCourseExam = DB::table('user_course_exams')
                ->where('id', $exam->user_course_exam_id)
                ->first();

            if (!$userCourseExam) {
                continue;
            }

            $intentos = $userCourseExam->intentos;

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
                }
            }
        }

        echo "\n✅ Se asignaron números de intento a " . DB::table('user_course_exam_results')->count() . " registros.\n";
    }
}
