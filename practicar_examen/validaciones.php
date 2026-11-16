<?php
function validarFormulario($post, $files) {
    $errores = array();

    // . Nombre: no vacío
    $nombre = isset($post['nombre']) ? trim($post['nombre']) : '';
    if ($nombre === '') {
        $errores['nombre'] = 'El nombre es obligatorio.';
    }

    // 2. Clave: 6 <= longitud <= 12
    $clave = isset($post['clave']) ? $post['clave'] : '';
    if (strlen($clave) < 6 | strlen($clave) > 12) {
        $errores['clave'] = 'La clave debe tener entre 6 y 12 caracteres.';
    }

    // 3. Género: M o F obligatorio
    $genero = isset($post['genero']) ? $post['genero'] : '';
    if (!in_array($genero, array('M', 'F'))) {
        $errores['genero'] = 'Debe seleccionar un género válido (M o F).';
    }

    // 4. Fecha nacimiento: formato dd/mm/aa y mayor de 18 años
    $fechaStr = isset($post['fechaNacimiento']) ? trim($post['fechaNacimiento']) : '';
    $fechaObj = DateTime::createFromFormat('d/m/y', $fechaStr);
    if (!$fechaObj || $fechaObj->format('d/m/y') !== $fechaStr) {
        $errores['fechaNacimiento'] = 'Formato inválido. Use dd/mm/aa.';
    } else {
        $hoy = new DateTime();
        $edad = $hoy->diff($fechaObj)->y;
        if ($fechaObj > $hoy || $edad < 18) {
 