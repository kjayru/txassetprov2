-- ========================================
-- VERIFICACIÓN DE APROBACIÓN DE CURSO
-- ========================================
-- Usuario: arturo.h.rivera@icloud.com
-- Curso ID: 8
-- Ejecuta estas queries en Navicat
-- ========================================

-- 1. BUSCAR USUARIO
SELECT 
    id,
    name,
    email,
    created_at
FROM users 
WHERE email = 'arturo.h.rivera@icloud.com';

-- Resultado esperado: Obtendrás el user_id
-- Anota el ID del usuario para las siguientes queries


-- 2. VERIFICAR INSCRIPCIÓN AL CURSO (Reemplaza USER_ID con el ID obtenido)
SELECT 
    uc.id as user_course_id,
    uc.user_id,
    uc.course_id,
    uc.aprobado,           -- ★ CAMPO CLAVE: 1 = APROBADO, 0 = NO APROBADO
    uc.intentos,           -- Intentos fallidos
    uc.fecha_inicio,
    uc.created_at,
    uc.updated_at,
    c.titulo as nombre_curso
FROM user_courses uc
INNER JOIN courses c ON c.id = uc.course_id
WHERE uc.user_id = USER_ID     -- ← REEMPLAZAR con el ID del paso 1
  AND uc.course_id = 8;

-- Si aprobado = 1 → ✅ APROBÓ
-- Si aprobado = 0 → ❌ NO APROBÓ


-- 3. OBTENER EXAMEN DEL CURSO
SELECT 
    ec.id,
    ec.exam_id,
    ec.course_id,
    e.title as titulo_examen,
    e.duration as duracion_minutos
FROM exam_courses ec
INNER JOIN exams e ON e.id = ec.exam_id
WHERE ec.course_id = 8;

-- Anota el exam_id para la siguiente query


-- 4. VERIFICAR SI TOMÓ EL EXAMEN (Reemplaza USER_COURSE_ID y EXAM_ID)
SELECT 
    uce.id as user_course_exam_id,
    uce.user_course_id,
    uce.exam_id,
    uce.complete,          -- 1 = Completó todas las preguntas
    uce.intentos,          -- Intentos del examen
    uce.tiempo,            -- Tiempo usado en segundos
    uce.created_at,
    uce.updated_at
FROM user_course_exams uce
WHERE uce.user_course_id = USER_COURSE_ID    -- ← REEMPLAZAR con user_course_id del paso 2
  AND uce.exam_id = EXAM_ID;                 -- ← REEMPLAZAR con exam_id del paso 3


-- 5. CALCULAR RESULTADOS DEL EXAMEN (Reemplaza USER_COURSE_EXAM_ID)
SELECT 
    COUNT(*) as total_respuestas,
    SUM(CASE WHEN result = 1 THEN 1 ELSE 0 END) as respuestas_correctas,
    SUM(CASE WHEN result = 0 THEN 1 ELSE 0 END) as respuestas_incorrectas,
    ROUND((SUM(CASE WHEN result = 1 THEN 1 ELSE 0 END) * 100.0) / COUNT(*), 2) as porcentaje_aciertos
FROM user_course_exam_results
WHERE user_course_exam_id = USER_COURSE_EXAM_ID;  -- ← REEMPLAZAR con user_course_exam_id del paso 4

-- Si porcentaje_aciertos >= 75.00 → ✅ APROBÓ
-- Si porcentaje_aciertos < 75.00 → ❌ REPROBÓ


-- 6. TOTAL DE PREGUNTAS DEL EXAMEN (Reemplaza EXAM_ID)
SELECT 
    COUNT(*) as total_preguntas_examen
FROM exam_questions
WHERE exam_id = EXAM_ID;  -- ← REEMPLAZAR con exam_id del paso 3


-- 7. VER DETALLE DE RESPUESTAS (OPCIONAL - Reemplaza USER_COURSE_EXAM_ID)
SELECT 
    eq.question as pregunta,
    eqo.opcion as opcion_seleccionada,
    eqo.resultado as es_correcta,    -- 1 = correcta, 0 = incorrecta
    ucer.result as resultado_usuario -- 1 = acertó, 0 = falló
FROM user_course_exam_results ucer
INNER JOIN exam_questions eq ON eq.id = ucer.exam_question_id
INNER JOIN exam_question_options eqo ON eqo.id = ucer.exam_question_option_id
WHERE ucer.user_course_exam_id = USER_COURSE_EXAM_ID  -- ← REEMPLAZAR
ORDER BY eq.id;


-- ========================================
-- QUERY COMPLETA TODO EN UNO (Más fácil)
-- ========================================
-- Solo reemplaza el email del usuario

SELECT 
    u.id as user_id,
    u.name as usuario_nombre,
    u.email as usuario_email,
    c.id as course_id,
    c.titulo as curso_titulo,
    uc.id as user_course_id,
    uc.aprobado as APROBADO,  -- ★★★ CAMPO CLAVE ★★★
    uc.intentos as intentos_fallidos,
    uc.fecha_inicio,
    uc.created_at as inscrito_el,
    uc.updated_at as ultima_actualizacion,
    uce.id as user_course_exam_id,
    uce.complete as examen_completo,
    uce.intentos as intentos_examen,
    uce.tiempo as tiempo_usado_segundos,
    (SELECT COUNT(*) FROM exam_questions WHERE exam_id = ec.exam_id) as total_preguntas,
    (SELECT COUNT(*) FROM user_course_exam_results WHERE user_course_exam_id = uce.id AND result = 1) as respuestas_correctas,
    (SELECT COUNT(*) FROM user_course_exam_results WHERE user_course_exam_id = uce.id) as total_respuestas,
    ROUND(
        (SELECT COUNT(*) FROM user_course_exam_results WHERE user_course_exam_id = uce.id AND result = 1) * 100.0 / 
        (SELECT COUNT(*) FROM exam_questions WHERE exam_id = ec.exam_id), 
        2
    ) as porcentaje_aciertos,
    CASE 
        WHEN uc.aprobado = 1 THEN '✅ APROBADO'
        ELSE '❌ NO APROBADO'
    END as estado
FROM users u
INNER JOIN user_courses uc ON uc.user_id = u.id
INNER JOIN courses c ON c.id = uc.course_id
LEFT JOIN exam_courses ec ON ec.course_id = c.id
LEFT JOIN user_course_exams uce ON uce.user_course_id = uc.id AND uce.exam_id = ec.exam_id
WHERE u.email = 'arturo.h.rivera@icloud.com'
  AND c.id = 8;

-- ========================================
-- INTERPRETACIÓN DE RESULTADOS:
-- ========================================
-- APROBADO = 1 → Usuario APROBÓ el curso ✅
-- APROBADO = 0 → Usuario NO aprobó el curso ❌
-- porcentaje_aciertos >= 75.00 → Aprobó el examen
-- porcentaje_aciertos < 75.00 → Reprobó el examen
-- ========================================
