<?php

if (isset($_POST['enviar'])) {

    echo "Nombre de usuario: " . $_POST['usuario'];
    echo "<br>";

    echo "Nombre de su fotografía: " . ($_POST['nombre_foto'] ?? '');
    echo "<br>";

    echo "Sexo: " . ($_POST['sexo'] ?? 'No seleccionado');
    echo "<br>";

    echo "Correo: " . $_POST['correo'];
    echo "<br>";

    echo "Clave: " . $_POST['clave'];
    echo "<br>";

    echo "Color: " . $_POST['color'];
    echo "<br>";

    echo "Aficción favorita: " . ($_POST['aficcion'] ?? 'No seleccionada');
    echo "<br>";

    if (isset($_POST['idiomas'])) {
        foreach ($_POST['idiomas'] as $idioma) {
            echo "Idioma: " . $idioma . "<br>";
        }
    }

    if (isset($_POST['extras'])) {
        foreach ($_POST['extras'] as $extra) {
            echo "Extra: " . $extra . "<br>";
        }
    }

    echo "Comentario: " . ($_POST['comentario'] ?? '');
    echo "<br>";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        echo "Nombre del archivo: " . $_FILES['foto']['name'];
        echo "<br>";
    } else {
        echo "No se ha seleccionado ninguna fotografía.";
        echo "<br>";
    }

} else {

    echo '<html>
    <body>
    Inserción de la fotografía del usuario:';

    echo '<form action="" method="post" enctype="multipart/form-data">';

    echo "Nombre usuario: <input type='text' name='usuario'><br>";

    echo "Nombre de su fotografía: <input type='text' name='nombre_foto'><br>";

    echo "Sexo:<br>";

    echo '<input type="radio" name="sexo" value="M"> Mujer<br>';
    echo '<input type="radio" name="sexo" value="H"> Hombre<br>';

    echo '<br>Aficción favorita:<br>';

    echo '<input type="radio" name="aficcion" value="deporte"> Deporte<br>';
    echo '<input type="radio" name="aficcion" value="musica"> Música<br>';

    echo '<input type="hidden" name="correo" value="siulee1626@gmail.com"><br>';

    echo "Password:<br>";
    echo '<input type="password" name="clave"><br>';

    echo 'Color:';

    echo '<select name="color">';
    echo '<option value="rojo" selected>Rojo</option>';
    echo '<option value="verde">Verde</option>';
    echo '<option value="azul">Azul</option>';
    echo '</select><br>';

    echo 'Idiomas:';

    echo '<select name="idiomas[]" multiple>';
    echo '<option value="español" selected>Español</option>';
    echo '<option value="ingles">Inglés</option>';
    echo '<option value="frances">Francés</option>';
    echo '</select><br>';

    echo 'Extras:';

    echo '<input type="checkbox" name="extras[]" value="garaje" checked> Garaje';
    echo '<input type="checkbox" name="extras[]" value="piscina"> Piscina';
    echo '<input type="checkbox" name="extras[]" value="jardin"> Jardín';
    echo '<br><br>';

    echo 'Este libro me parece...<br>';

    echo '<textarea cols="30" rows="4" name="comentario"></textarea><br>';

    echo 'Fichero con su fotografía: <input type="file" name="foto"><br>';

    echo '<input type="submit" name="enviar" value="Enviar">';

    echo '</form>
    </body>
    </html>';

}

?>