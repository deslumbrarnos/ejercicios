<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recibe y Repintar Formularios</title>
</head>
<body>
<?php
include("funciones.php");

// Aquí empiezo a iniciar con las variables vacías para la primera ejecución
$nombre = "";
$clave = "";
$genero = "";
$fechaNacimiento = "";
$paises = array();
$acepto = "";
$comentarios = "";
$nombreFoto = "No subida";

// Arrays de control de errores para cada campito
$errores = array(
    'nombre' => false,
    'clave' => false,
    'genero' => false,
    'fechaNacimiento' => false,
    'pais' => false,
    'acepto' => false,
    'foto' => false
);

$mostrarDatos = false;

// Datos para los controles (generados por las funciones)
$arrayGenero = array('Mujer' => 'F', 'Hombre' => 'M');
$arrayPaises = array('ES' => 'España', 'FR' => 'Francia', 'IT' => 'Italia', 'PT' => 'Portugal');
$arrayCheck = array(
    array('nombre' => 'acepto', 'valor' => 'OK', 'etiqueta' => 'Acepto las condiciones')
);

if (isset($_POST['enviar'])) {
    // 1. Validamos nombre
    $nombre = $_POST['nombre'];
    if (empty($nombre) || $nombre == '') {
        $errores['nombre'] = true;
    }

    // 2. Validamos clave
    $clave = $_POST['clave'];
    if (strlen($clave) < 6 || strlen($clave) > 12) {
        $errores['clave'] = true;
    }

    // 3. Validamos género
    if (!isset($_POST['genero']) || ($_POST['genero'] != 'M' && $_POST['genero'] != 'F')) {
        $errores['genero'] = true;
    } else {
        $genero = $_POST['genero'];
    }

    // 4. Validamos la fecha de nacimiento
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $partesFecha = explode('/', $fechaNacimiento);
    if (count($partesFecha) != 3) {
        $errores['fechaNacimiento'] = true;
    } else {
        $anioActual2Cifras = (int)date('y');
        $anioNum = (int)$partesFecha[2];
        if ($anioNum > $anioActual2Cifras) {
            $anioCompleto = 1900 + $anioNum;
        } else {
            $anioCompleto = 2000 + $anioNum;
        }

        if (!checkdate((int)$partesFecha[1], (int)$partesFecha[0], $anioCompleto)) {
            $errores['fechaNacimiento'] = true;
        } else {
            $edad = date('Y') - $anioCompleto;
            if (date('m') < (int)$partesFecha[1] || (date('m') == (int)$partesFecha[1] && date('d') < (int)$partesFecha[0])) {
                $edad--;
            }
            if ($edad < 18) {
                $errores['fechaNacimiento'] = true;
            }
        }
    }

    // 5. Validamos el país
    if (!isset($_POST['pais']) || count($_POST['pais']) == 0) {
        $errores['pais'] = true;
    } else {
        $paises = $_POST['pais'];
    }

    // 6. Validamos el acepto
    if (!isset($_POST['acepto']) || $_POST['acepto'] != 'OK') {
        $errores['acepto'] = true;
    } else {
        $acepto = $_POST['acepto'];
    }

    // 7. Comentarios
    $comentarios = $_POST['comentarios'];

    // 8. Validamos foto (si es que se ha enviado)
    if (isset($_FILES['foto']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $nombreFichero = $_FILES['foto']['name'];
        $tamanoFichero = $_FILES['foto']['size'];
        $partesNombre = explode('.', $nombreFichero);
        $extension = strtolower(end($partesNombre));
        $extensionesValidas = array('jpg', 'png', 'gif');
        $tamanoMax = 5 * 1024 * 1024;

        if (!in_array($extension, $extensionesValidas) || $tamanoFichero > $tamanoMax) {
            $errores['foto'] = true;
        } else {
            $nombreDirectorio = "img/";
            if (is_dir($nombreDirectorio)) {
                $idUnico = time();
                $nombreFoto = $idUnico . "-" . $nombreFichero;
                move_uploaded_file($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFoto);
            }
        }
    }

    // Si no hay ningún error, se mostraerían los datos y se vaciaría el formulario
    if (!in_array(true, $errores)) {
        $mostrarDatos = true;
        
        // Guardamos los datos validados para hacer el eco después del formulario
        $datosCorrectos = array(
            'nombre' => $nombre,
            'clave' => $clave,
            'genero' => $genero,
            'fechaNacimiento' => $fechaNacimiento,
            'paises' => implode(", ", $paises),
            'acepto' => $acepto,
            'comentarios' => $comentarios,
            'foto' => $nombreFoto
        );

        // Vaciamos las variables para pintar el formulario vacío
        $nombre = "";
        $clave = "";
        $genero = "";
        $fechaNacimiento = "";
        $paises = array();
        $acepto = "";
        $comentarios = "";
    }
}

// Pintamos el formulario
$valoresCheck = array('acepto' => $acepto);

$formulario = '<form action="recibeYrepinta.php" method="post" enctype="multipart/form-data">';

// Nombre
$formulario .= 'Nombre: <input type="text" name="nombre" value="' . $nombre . '" />';
if ($errores['nombre']) {
    $formulario .= ' <font size="2" color="red">Ooops, el nombre no puede estar vacío</font>';
}
$formulario .= '<br/><br/>';

// Clave
$formulario .= 'Clave: <input type="password" name="clave" value="' . $clave . '" />';
if ($errores['clave']) {
    $formulario .= ' <font size="2" color="red">Ooops, la clave debe tener entre 6 y 12 caracteres</font>';
}
$formulario .= '<br/><br/>';

// Género (usando función)
$formulario .= 'Género: ' . generaBotonesRadio('genero', $arrayGenero, $genero);
if ($errores['genero']) {
    $formulario .= ' <font size="2" color="red">Oops, debe seleccionar un género</font>';
}
$formulario .= '<br/><br/>';

// Fecha nacimiento
$formulario .= 'Fecha de nacimiento (dd/mm/aa): <input type="text" name="fechaNacimiento" value="' . $fechaNacimiento . '" />';
if ($errores['fechaNacimiento']) {
    $formulario .= ' <font size="2" color="red">Ooops, fecha incorrecta o menor de 18 años</font>';
}
$formulario .= '<br/><br/>';

// País (usando función)
$formulario .= 'País:<br/>' . generaSelectMultiple('pais', $arrayPaises, $paises);
if ($errores['pais']) {
    $formulario .= ' <font size="2" color="red">Ooops, debe seleccionar al menos un país</font>';
}
$formulario .= '<br/><br/>';

// Acepto (usando función)
$formulario .= generaCajasVerificacion($arrayCheck, $valoresCheck);
if ($errores['acepto']) {
    $formulario .= ' <font size="2" color="red">Ooops, debe aceptar las condiciones</font>';
}
$formulario .= '<br/><br/>';

// Comentarios
$formulario .= 'Comentarios:<br/><textarea name="comentarios" rows="4" cols="40">' . $comentarios . '</textarea><br/><br/>';

// Foto
$formulario .= 'Foto: <input type="file" name="foto" />';
if ($errores['foto']) {
    $formulario .= ' <font size="2" color="red">Ooops, extensión no válida (jpg, png, gif) o tamaño mayor a 5MB</font>';
}
$formulario .= '<br/><br/>';

$formulario .= '<input type="submit" name="enviar" value="Enviar" />';
$formulario .= '</form>';

echo $formulario;

// Si los datos son correctos, hacemos un eco seguido del formulario vacío
if ($mostrarDatos) {
    echo "<hr/><h3>Parámetros recibidos:</h3>";
    echo "Nombre: " . $datosCorrectos['nombre'] . "<br/>";
    echo "Clave: " . $datosCorrectos['clave'] . "<br/>";
    echo "Género: " . $datosCorrectos['genero'] . "<br/>";
    echo "Fecha de nacimiento: " . $datosCorrectos['fechaNacimiento'] . "<br/>";
    echo "Países: " . $datosCorrectos['paises'] . "<br/>";
    echo "Acepto: " . $datosCorrectos['acepto'] . "<br/>";
    echo "Comentarios: " . $datosCorrectos['comentarios'] . "<br/>";
    echo "Foto: " . $datosCorrectos['foto'] . "<br/>";
}
?>
</body>
</html>