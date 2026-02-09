<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\UserCourseExamResult;
use App\Models\ExamQuestion;
use App\Models\ExamCourse;
use App\Models\UserCourse;

$userCourseId = 198;
$uc = UserCourse::find($userCourseId);
$examCourse = ExamCourse::where('course_id', $uc->course_id)->first();
$totalQuestions = ExamQuestion::where('exam_id', $examCourse->exam_id)->count();

$results = UserCourseExamResult::where('user_course_exam_id', 140)
    ->orderBy('created_at')
    ->get();

echo "Usuario 198 - {$uc->user->name} ({$uc->user->email})\n";
echo "Total respuestas en DB: {$results->count()}\n";
echo "Preguntas del examen: {$totalQuestions}\n\n";

// Detectar intentos diferentes (respuestas con más de 10 minutos de diferencia)
$intentos = [];
$intentoActual = [];
$ultimaFecha = null;

foreach ($results as $result) {
    if ($ultimaFecha === null || $result->created_at->diffInMinutes($ultimaFecha) > 10) {
        if (!empty($intentoActual)) {
            $intentos[] = $intentoActual;
        }
        $intentoActual = [];
    }
    $intentoActual[] = $result;
    $ultimaFecha = $result->created_at;
}

if (!empty($intentoActual)) {
    $intentos[] = $intentoActual;
}

echo "Intentos detectados: " . count($intentos) . "\n\n";

foreach ($intentos as $idx => $intento) {
    $correctas = collect($intento)->where('result', 1)->count();
    $porcentaje = round(($correctas * 100) / $totalQuestions, 2);
    $fecha = $intento[0]->created_at->format('Y-m-d H:i:s');
    
    echo "Intento " . ($idx + 1) . " - {$fecha}:\n";
    echo "  Respuestas: " . count($intento) . "\n";
    echo "  Correctas: {$correctas}\n";
    echo "  Porcentaje: {$porcentaje}%\n";
    echo "  " . ($porcentaje >= 75 ? "✅ APROBADO" : "❌ REPROBADO") . "\n\n";
}

// El último intento es el que cuenta
$ultimoIntento = end($intentos);
$correctasUltimo = collect($ultimoIntento)->where('result', 1)->count();
$porcentajeUltimo = round(($correctasUltimo * 100) / $totalQuestions, 2);

echo "==========================================\n";
echo "ÚLTIMO INTENTO (el que debe contar):\n";
echo "  Respuestas: " . count($ultimoIntento) . "\n";
echo "  Correctas: {$correctasUltimo}\n";
echo "  Porcentaje REAL: {$porcentajeUltimo}%\n";
echo "  Aprobado: " . ($porcentajeUltimo >= 75 ? "✅ SÍ" : "❌ NO") . "\n";
echo "==========================================\n";
