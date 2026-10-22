```html
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Subir fotografía</title>
</head>

<body>

    <form action="subeFichero.php" method="POST" enctype="multipart/form-data">

        <label>Nombre de usuario: </label>
        <input type="text" name="usuario" required>
        <br><br>

        <label>Selecciona tu fotografía:</label>
        <input type="text" name="foto" accept="image/*" required>
        <br><br>

        <input type="submit" value="Enviar">

    </form>

</body>

</html>
```