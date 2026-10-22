```php
<?php

if (isset($_POST['usuario']) && isset($_FILES['foto'])) {

    $usuario = $_POST['usuario'];
    $foto = $_FILES['foto']['name'];

    echo "Nombre de usuario: " . htmlspecialchars($usuario);
    echo "<br>";

    echo "Nombre de la fotografía: " . htmlspecialchars($foto);

}

?>
```