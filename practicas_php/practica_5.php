<?php

// Función para calcular el dinero ahorrado
function calculaCantidad($anos, $cantidad, $interes) {
    $cantidadFinal = $cantidad * pow(1 + $interes / 100, $anos);

    return round($cantidadFinal, 2);
}

// Comprobamos si se ha enviado el formulario
if (isset($_POST['calcular'])) {

    $cantidad = $_POST['cantidad'];
    $interes = $_POST['interes'];
    $anos = $_POST['anos'];

    // Calculamos el importe final
    $resultado = calculaCantidad($anos, $cantidad, $interes);

    // Calculamos el beneficio obtenido
    $ganancia = $resultado - $cantidad;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora de ahorros</title>
</head>

<body>

    <h1>Calculadora de ahorros</h1>

    <form method="POST" action="">

        <label for="cantidad">Cantidad inicial (€):</label>
        <input type="number" id="cantidad" name="cantidad"
               min="0.01" step="0.01" required>

        <br><br>

        <label for="interes">Interés anual (%):</label>
        <input type="number" id="interes" name="interes"
               min="0" step="0.01" value="5" required>

        <br><br>

        <label for="anos">Número de años:</label>
        <input type="number" id="anos" name="anos"
               min="1" max="100" step="1" value="5" required>

        <br><br>

        <input type="submit" name="calcular" value="Calcular ahorro">

    </form>

    <?php

    // Mostramos los resultados si se ha enviado el formulario
    if (isset($_POST['calcular'])) {

        echo '<h2>Resultado del ahorro</h2>';

        echo '<p>Dinero inicial: <b>'
            . number_format($cantidad, 2, ',', '.') . ' €</b></p>';

        echo '<p>Interés anual: <b>'
            . $interes . ' %</b></p>';

        echo '<p>Tiempo de ahorro: <b>'
            . $anos . ' años</b></p>';

        echo '<p>Importe final: <b>'
            . number_format($resultado, 2, ',', '.') . ' €</b></p>';

        echo '<p>Ganancia obtenida: <b>'
            . number_format($ganancia, 2, ',', '.') . ' €</b></p>';
    }

    ?>

</body>
</html>
