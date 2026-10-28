<?php

if (isset($_POST['enviar'])) {

    echo "Nombre de usuario: " . $_POST['usuario'];
    echo "<br>";

    echo "Nombre de su fotografía: " . $_POST['foto'];
    echo "<br>";

    echo "Sexo: " . $_POST['sexo'];
    echo "<br>";

    echo "Correo: " . $_POST['correo'];
    echo "<br>";

    echo "Clave: " . $_POST['clave'];
    echo "<br>";

    echo "Color: " . $_POST['color'];
    echo "<br>";

    echo "Aficción favorita: " . $_POST['aficcion'];
    echo "<br>";

    if (isset($_POST['idiomas'])) {
        foreach ($_POST['idiomas'] as $idioma) {
            echo "Idioma: " . $idioma . "<br>";
        }
    }

} else {

    echo '<html>
    <body>
    Inserción de la fotografía del usuario:
    <form action="" method="post">';

    echo "Nombre usuario: <input type='text' name='usuario'><br>";

    echo "Nombre de su fotografía: <input type='text' name='foto'><br>";

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

    echo '<input type="submit" name="enviar" value="Enviar">';

    echo '</form>
    </body>
    </html>';

}

?>