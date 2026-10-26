<?php

if (isset($_POST['enviar'])) {
    // Si se ha enviado el formulario, procesamos los datos
    echo "Nombre de usuario: " . $_POST['usuario'];
    echo "<br>";

    echo "Nombre de su fotografía: " . $_POST['foto'];
    echo "<br>";

    echo "Sexo: " . $_POST['sexo'];
    echo "<br>";

    echo "Aficción favorita: " . $_POST['aficcion'];

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

    echo '<br> Aficción favorita: </br>';

    echo '<input type= "radio" name="aficcion" value="deporte"> Deporte<br>';

    echo '<input type= "radio" name="aficcion" VALUE="musica"> Musica<br>';

    echo '<input type="submit" name="enviar" value="Enviar">';

    echo '
    </form>
    </body>
    </html>';

}

?>