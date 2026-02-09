-- ========================================
-- CORRECCIÓN PARA USUARIO ARTURO
-- ========================================
-- Usuario: arturo.h.rivera@icloud.com (ID: 210)
-- Curso ID: 8
-- UserCourse ID: 199
-- Porcentaje: 91.18% (62 correctas de 68 preguntas)
-- Problema: Marcado como aprobado=0 cuando debería ser aprobado=1
-- ========================================

-- PASO 1: Verificar estado actual
SELECT 
    uc.id as user_course_id,
    u.name as usuario,
    u.email,
    c.titulo as curso,
    uc.aprobado,
    uc.caducado,
    uc.finalizado,
    uc.intentos,
    (SELECT COUNT(*) FROM user_course_exam_results ucer
     INNER JOIN user_course_exams uce ON uce.id = ucer.user_course_exam_id
     WHERE uce.user_course_id = uc.id AND ucer.result = 1) as respuestas_correctas,
    (SELECT COUNT(*) FROM exam_questions eq 
     INNER JOIN exam_courses ec ON ec.exam_id = eq.exam_id
     WHERE ec.course_id = c.id) as total_preguntas,
    ROUND(
        (SELECT COUNT(*) FROM user_course_exam_results ucer
         INNER JOIN user_course_exams uce ON uce.id = ucer.user_course_exam_id
         WHERE uce.user_course_id = uc.id AND ucer.result = 1) * 100.0 / 
        (SELECT COUNT(*) FROM exam_questions eq 
         INNER JOIN exam_courses ec ON ec.exam_id = eq.exam_id
         WHERE ec.course_id = c.id), 
        2
    ) as porcentaje_real
FROM user_courses uc
INNER JOIN users u ON u.id = uc.user_id
INNER JOIN courses c ON c.id = uc.course_id
WHERE uc.id = 199;


-- PASO 2: CORRECCIÓN - Actualizar a APROBADO
-- ⚠️ Solo ejecutar si el porcentaje_real >= 75%
UPDATE user_courses 
SET 
    aprobado = 1,
    finalizado = 1,
    caducado = 0,
    updated_at = NOW()
WHERE id = 199
  AND aprobado = 0;  -- Condición de seguridad


-- PASO 3: Verificar la corrección
SELECT 
    uc.id,
    u.name,
    u.email,
    c.titulo,
    uc.aprobado as APROBADO,
    uc.caducado,
    uc.finalizado,
    CASE 
        WHEN uc.aprobado = 1 THEN '✅ CORRECTO - Puede ver certificado'
        ELSE '❌ ERROR - Revisar'
    END as estado_certificacion
FROM user_courses uc
INNER JOIN users u ON u.id = uc.user_id
INNER JOIN courses c ON c.id = uc.course_id
WHERE uc.id = 199;


-- ========================================
-- QUERY PREVENTIVA: Buscar otros casos similares
-- ========================================
-- Encuentra todos los usuarios con >75% pero aprobado=0

SELECT 
    uc.id as user_course_id,
    u.id as user_id,
    u.name,
    u.email,
    c.id as course_id,
    c.titulo as curso,
    uc.aprobado,
    uc.caducado,
    (SELECT COUNT(*) FROM user_course_exam_results ucer
     INNER JOIN user_course_exams uce ON uce.id = ucer.user_course_exam_id
     WHERE uce.user_course_id = uc.id AND ucer.result = 1) as respuestas_correctas,
    (SELECT COUNT(*) FROM exam_questions eq 
     INNER JOIN exam_courses ec ON ec.exam_id = eq.exam_id
     WHERE ec.course_id = c.id) as total_preguntas,
    ROUND(
        (SELECT COUNT(*) FROM user_course_exam_results ucer
         INNER JOIN user_course_exams uce ON uce.id = ucer.user_course_exam_id
         WHERE uce.user_course_id = uc.id AND ucer.result = 1) * 100.0 / 
        (SELECT COUNT(*) FROM exam_questions eq 
         INNER JOIN exam_courses ec ON ec.exam_id = eq.exam_id
         WHERE ec.course_id = c.id), 
        2
    ) as porcentaje_real,
    uc.created_at as fecha_inscripcion,
    uc.updated_at as ultima_actualizacion
FROM user_courses uc
INNER JOIN users u ON u.id = uc.user_id
INNER JOIN courses c ON c.id = uc.course_id
WHERE uc.aprobado = 0
  AND EXISTS (
      SELECT 1 FROM user_course_exams uce
      WHERE uce.user_course_id = uc.id AND uce.complete = 1
  )
HAVING porcentaje_real >= 75.00
ORDER BY porcentaje_real DESC;


-- ========================================
-- CORRECCIÓN MASIVA (OPCIONAL)
-- ========================================
-- Solo ejecutar después de revisar los resultados de la query anterior
-- ⚠️ Guarda un backup antes de ejecutar esta query

/*
UPDATE user_courses uc
INNER JOIN (
    SELECT 
        uc.id as user_course_id,
        ROUND(
            (SELECT COUNT(*) FROM user_course_exam_results ucer
             INNER JOIN user_course_exams uce ON uce.id = ucer.user_course_exam_id
             WHERE uce.user_course_id = uc.id AND ucer.result = 1) * 100.0 / 
            (SELECT COUNT(*) FROM exam_questions eq 
             INNER JOIN exam_courses ec ON ec.exam_id = eq.exam_id
             INNER JOIN courses c ON c.id = ec.course_id
             WHERE c.id = uc.course_id), 
            2
        ) as porcentaje
    FROM user_courses uc
    WHERE uc.aprobado = 0
      AND EXISTS (
          SELECT 1 FROM user_course_exams uce
          WHERE uce.user_course_id = uc.id AND uce.complete = 1
      )
    HAVING porcentaje >= 75.00
) as correccion ON correccion.user_course_id = uc.id
SET 
    uc.aprobado = 1,
    uc.finalizado = 1,
    uc.updated_at = NOW();
*/


-- ========================================
-- NOTAS IMPORTANTES
-- ========================================
-- 1. La corrección aplicada en el código previene futuros casos
-- 2. Esta query corrige casos históricos existentes
-- 3. Los usuarios corregidos podrán ahora ver sus certificados
-- 4. La caducidad ya NO afecta a cursos aprobados
-- ========================================
