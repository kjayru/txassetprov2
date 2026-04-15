<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Añade columnas "ghost" que existen en BD pero no tenían migración.
 * Si la columna ya existe (fue añadida manualmente), se omite sin error.
 */
class AddMissingColumnsToExamTables extends Migration
{
    public function up()
    {
        // --- user_course_exams ---
        Schema::table('user_course_exams', function (Blueprint $table) {
            if (!Schema::hasColumn('user_course_exams', 'complete')) {
                $table->tinyInteger('complete')->nullable()->default(null)->after('resultado');
            }
            if (!Schema::hasColumn('user_course_exams', 'evento')) {
                $table->string('evento')->nullable()->after('complete');
            }
            // intentos puede ser NULL al crear el registro (antes de completar algún intento)
            // La migración original lo define sin default; lo hacemos nullable con default 0
            // Solo modificamos si está en modo strict (en muchos entornos ya es 0)
        });

        // --- user_course_exam_results ---
        Schema::table('user_course_exam_results', function (Blueprint $table) {
            if (!Schema::hasColumn('user_course_exam_results', 'result')) {
                $table->tinyInteger('result')->nullable()->default(0)->after('exam_question_option_id');
            }
            // attempt_number ya lo agrega la migración 2026_02_09
        });

        // --- user_courses ---
        Schema::table('user_courses', function (Blueprint $table) {
            if (!Schema::hasColumn('user_courses', 'finalizado')) {
                $table->tinyInteger('finalizado')->nullable()->default(0)->after('aprobado');
            }
            if (!Schema::hasColumn('user_courses', 'caducado')) {
                $table->tinyInteger('caducado')->nullable()->default(0)->after('finalizado');
            }
            if (!Schema::hasColumn('user_courses', 'reiniciado')) {
                $table->tinyInteger('reiniciado')->nullable()->default(0)->after('caducado');
            }
            if (!Schema::hasColumn('user_courses', 'intentos')) {
                $table->integer('intentos')->nullable()->default(0)->after('reiniciado');
            }
            if (!Schema::hasColumn('user_courses', 'parent_id')) {
                $table->unsignedBigInteger('parent_id')->nullable()->after('intentos');
                $table->foreign('parent_id')->references('id')->on('user_courses')->onDelete('set null');
            }
            if (!Schema::hasColumn('user_courses', 'tiempo')) {
                $table->string('tiempo')->nullable()->after('parent_id');
            }
        });

        // --- exams ---
        Schema::table('exams', function (Blueprint $table) {
            if (!Schema::hasColumn('exams', 'description')) {
                $table->text('description')->nullable()->after('duration');
            }
        });
    }

    public function down()
    {
        Schema::table('user_course_exams', function (Blueprint $table) {
            $table->dropColumn(array_filter(['complete', 'evento'], fn($c) => Schema::hasColumn('user_course_exams', $c)));
        });

        Schema::table('user_course_exam_results', function (Blueprint $table) {
            if (Schema::hasColumn('user_course_exam_results', 'result')) {
                $table->dropColumn('result');
            }
        });

        Schema::table('user_courses', function (Blueprint $table) {
            $cols = ['finalizado', 'caducado', 'reiniciado', 'intentos', 'parent_id', 'tiempo'];
            $existing = array_filter($cols, fn($c) => Schema::hasColumn('user_courses', $c));
            if ($existing) {
                $table->dropForeign(['parent_id']);
                $table->dropColumn(array_values($existing));
            }
        });

        Schema::table('exams', function (Blueprint $table) {
            if (Schema::hasColumn('exams', 'description')) {
                $table->dropColumn('description');
            }
        });
    }
}
