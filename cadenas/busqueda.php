

<?php

if (isset($_POST['enviar'])) {

    echo "Nombre de usuario: " . $_POST['usuario'];
    echo "<br>";

    echo "Nombre de su fotografía: " . $_FILES['foto']['name'];

} else {

?>

<html>
<body>

    Inserción de la fotografía del usuario:

    <form action="" method="post" enctype="multipart/form-data">

        Nombre de usuario:
        <input type="text" name="usuario">
        <br>

        Nombre de su fotografía:
        <input type="file" name="foto">
        <br>

        <input type="submit" name="enviar" value="Enviar">

    </form>

</body>
</html>

<?php
}
?>

