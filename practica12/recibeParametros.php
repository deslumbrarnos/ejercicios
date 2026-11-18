<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recibe Parámetros</title>
</head>
<body>
<?php
if (isset($_POST['enviar'])) {
    $errores = false;
    $mensajeError = "";

    // 1. Comprobamos que el nombre no esté vacío
    $nombre = $_POST['nombre'];
    if (empty($nombre) || $nombre == '') {
        $errores = true;
        $mensajeError .= "<br>- Nombre vacío";
    }

    // 2. Comprobamos clave (entre 6 y 12)
    $clave = $_POST['clave'];
    $longitudClave = strlen($clave);
    if ($longitudClave < 6 || $longitudClave > 12) {
        $errores = true;
        $mensajeError .= "<br>- Clave incorrecta";
    }

    // 3. Comprobamos género (obligatorio, F o M)
    if (!isset($_POST['genero']) || ($_POST['genero'] != 'F' && $_POST['genero'] != 'M')) {
        $errores = true;
        $mensajeError .= "<br>- Género no seleccionado";
    } else {
        $genero = $_POST['genero'];
    }

    // 4. Comprobamos fechaNacimiento (dd/mm/aa y que sea mayor de 18 años)
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $partesFecha = explode('/', $fechaNacimiento);
    if (count($partesFecha) != 3 || !checkdate((int)$partesFecha[1], (int)$partesFecha[0], (int)('20' . $partesFecha[2])) && !checkdate((int)$partesFecha[1], (int)$partesFecha[0], (int)('19' . $partesFecha[2]))) {
        $errores = true;
        $mensajeError .= "<br>- Formato de fecha incorrecto";
    } else {
        // Calculamos el año completo, las dos cifras del año actual y el año de nacimiento
        $anioActual2Cifras = (int)date('y');
        $anioNum = (int)$partesFecha[2];
        if ($anioNum > $anioActual2Cifras) {
            $anioCompleto = 1900 + $anioNum;
        } else {
            $anioCompleto = 2000 + $anioNum;
        }

        if (!checkdate((int)$partesFecha[1], (int)$partesFecha[0], $anioCompleto)) {
            $errores = true;
            $mensajeError .= "<br>- Fecha no válida";
        } else {
            // Comprobamos si el usuario es mayor de 18 
            $edad = date('Y') - $anioCompleto;
            if (date('m') < (int)$partesFecha[1] || (date('m') == (int)$partesFecha[1] && date('d') < (int)$partesFecha[0])) {
                $edad--;
            }
            if ($edad < 18) {
                $errores = true;
                $mensajeError .= "<br>- Menor de 18 años";
            }
        }
    }

    // 5. Comprobamos país (obligatorio, al menos debe haber uno seleccionado)
    if (!isset($_POST['pais']) || count($_POST['pais']) == 0) {
        $errores = true;
        $mensajeError .= "<br>- País no seleccionado";
    } else {
        $paises = $_POST['pais'];
    }

    // 6. Comprobamos acepto (obligatorio, debe ser "OK")
    if (!isset($_POST['acepto']) || $_POST['acepto'] != 'OK') {
        $errores = true;
        $mensajeError .= "<br>- Casilla acepto";
    } else {
        $acepto = $_POST['acepto'];
    }

    // 7. Comentarios ( ete es opcional, no hay restricciones)
    $comentarios = $_POST['comentarios'];

    // 8. Foto (sin restricción obligatoria, pero solo se sube si es jpg, png o gif y que sea <= 5MB)
    $nombreFoto = "No subida";
    if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $nombreFichero = $_FILES['foto']['name'];
        $tamanoFichero = $_FILES['foto']['size'];
        $partesNombre = explode('.', $nombreFichero);
        $extension = strtolower(end($partesNombre));
        $extensionesValidas = array('jpg', 'png', 'gif');
        $tamanoMax = 5 * 1024 * 1024; // parametro para que no sobre pase de los 5MB

        if (!in_array($extension, $extensionesValidas) || $tamanoFichero > $tamanoMax) {
            $errores = true;
            $mensajeError .= "<br>- Foto (extensión o tamaño)";
        } else {
            $nombreDirectorio = "img/";
            if (is_dir($nombreDirectorio)) {
                $idUnico = time();
                $nombreFoto = $idUnico . "-" . $nombreFichero;
                move_uploaded_file($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFoto);
            }
        }
    }

    // Mostramos los resultados si no hay errores
    if ($errores == false) {
        echo "<h3>Datos recibidos correctamente:</h3>";
        echo "Nombre: " . $nombre . "<br/>";
        echo "Clave: " . $clave . "<br/>";
        echo "Género: " . $genero . "<br/>";
        echo "Fecha de nacimiento: " . $fechaNacimiento . "<br/>";
        echo "Países seleccionados: " . implode(", ", $paises) . "<br/>";
        echo "Acepto: " . $acepto . "<br/>";
        echo "Comentarios: " . $comentarios . "<br/>";
        echo "Foto: " . $nombreFoto . "<br/>";
    } else {
        echo '<font size="2" color="red">Error: Oops, algunos datos no cumplen las reglas establecidas.' . $mensajeError . '</font>';
    }
}
?>
</body>
</html>