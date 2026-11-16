<?php

// Función para calcular el dinero acumulado después de varios años
function calculaCantidad($anos, $cantidad, $interes) {

    // Calculamos el capital final aplicando el interés compuesto
    $cantidadFinal = $cantidad * pow(1 + $interes / 100, $anos);

    // Devolvemos el resultado
    return round($cantidadFinal, 2);
}

echo '<h1>Práctica 5: Formularios y Funciones</h1>';

echo calculaCantidad(5, 100, 5);
echo ' &#x20AC; en cinco años.</p>';

$interes = 5;

echo '<p><b>El interés actual es: </b>' . $interes . '%</p>';

echo '<p>Si usted deposita 100 &#x20AC; hoy sus ahorros crecerán a: <b>'
    . (100 + (100 * $interes / 100))
    . ' &#x20AC;</b> en un año.</p>';

echo calculaCantidad(5, 100, $interes);
echo ' &#x20AC; en cinco años.</p>';

echo '<p>Si usted deposita 1.500 &#x20AC; hoy sus ahorros crecerán a: <b>'
    . (1500 + (1500 * $interes / 100))
    . ' &#x20AC;</b> en un año.</p>';

echo calculaCantidad(20, 1500, $interes);
echo ' &#x20AC; en veinte años.</p>';

?>
