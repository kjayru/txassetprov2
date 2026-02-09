<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\UserCourse;
use App\Models\Course;
use App\Models\UserCourseExam;
use App\Models\ExamCourse;
use App\Models\UserCourseExamResult;

$email = 'arturo.h.rivera@icloud.com';
$courseId = 8;

echo "========================================\n";
echo "VERIFICACIÓN DE APROBACIÓN DE CURSO\n";
echo "========================================\n\n";

// Buscar usuario
$user = User::where('email', $email)->first();

if (!$user) {
    echo "❌ Usuario NO encontrado con email: $email\n";
    exit(1);
}

echo "👤 USUARIO ENCONTRADO:\n";
echo "   ID: {$user->id}\n";
echo "   Nombre: {$user->name}\n";
echo "   Email: {$user->email}\n\n";

// Buscar inscripción al curso
$userCourse = UserCourse::where('user_id', $user->id)
                        ->where('course_id', $courseId)
                        ->first();

if (!$userCourse) {
    echo "❌ El usuario NO está inscrito en el curso ID: $courseId\n";
    exit(1);
}

echo "📚 INSCRIPCIÓN AL CURSO:\n";
echo "   User Course ID: {$userCourse->id}\n";
echo "   Course ID: {$userCourse->course_id}\n";

$curso = Course::find($courseId);
if ($curso) {
    echo "   Título: {$curso->titulo}\n";
}

echo "\n";
echo "✅ ESTADO DE APROBACIÓN:\n";
echo "   Aprobado: " . ($userCourse->aprobado == 1 ? '✅ SÍ (1)' : '❌ NO (0)') . "\n";
echo "   Intentos: {$userCourse->intentos}\n";
echo "   Fecha inscripción: {$userCourse->created_at}\n";
echo "   Última actualización: {$userCourse->updated_at}\n\n";

// Verificar si tomó el examen
$examCourse = ExamCourse::where('course_id', $courseId)->first();

if ($examCourse) {
    echo "📝 EXAMEN FINAL:\n";
    echo "   Exam ID: {$examCourse->exam_id}\n";
    
    $userExam = UserCourseExam::where('user_course_id', $userCourse->id)
                              ->where('exam_id', $examCourse->exam_id)
                              ->first();
    
    if ($userExam) {
        echo "   Completado: " . ($userExam->complete == 1 ? 'SÍ' : 'NO') . "\n";
        echo "   Intentos examen: {$userExam->intentos}\n";
        echo "   Tiempo: {$userExam->tiempo} segundos\n";
        
        // Calcular porcentaje
        $totalPreguntas = \App\Models\ExamQuestion::where('exam_id', $examCourse->exam_id)->count();
        $respuestasCorrectas = UserCourseExamResult::where('user_course_exam_id', $userExam->id)
                                                   ->where('result', 1)
                                                   ->count();
        $totalRespuestas = UserCourseExamResult::where('user_course_exam_id', $userExam->id)->count();
        
        if ($totalPreguntas > 0) {
            $porcentaje = round(($respuestasCorrectas * 100) / $totalPreguntas, 2);
            echo "\n   📊 RESULTADOS:\n";
            echo "   Total preguntas: {$totalPreguntas}\n";
            echo "   Respuestas correctas: {$respuestasCorrectas}\n";
            echo "   Porcentaje: {$porcentaje}%\n";
            echo "   Umbral aprobación: 75%\n";
            echo "   Estado: " . ($porcentaje >= 75 ? '✅ APROBADO' : '❌ REPROBADO') . "\n";
        }
    } else {
        echo "   ⚠️  No hay registro de examen tomado\n";
    }
} else {
    echo "⚠️  No hay examen configurado para este curso\n";
}

echo "\n========================================\n";
echo "CONCLUSIÓN: ";
if ($userCourse->aprobado == 1) {
    echo "✅ EL USUARIO SÍ APROBÓ EL CURSO\n";
} else {
    echo "❌ EL USUARIO NO HA APROBADO EL CURSO\n";
}
echo "========================================\n";
