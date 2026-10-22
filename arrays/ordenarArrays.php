<?php

// ================================
// ARRAY NUMÉRICO
// ================================

$numeros = array(5, 2, 8, 1, 9, 3);

echo "<h3>Array numérico original:</h3>";
print_r($numeros);

echo "<br><br>";

// Orden ascendente (de menor a mayor)
sort($numeros);

echo "<b>sort() - Ascendente:</b><br>";
print_r($numeros);

echo "<br><br>";

// Orden descendente (de mayor a menor:p)
rsort($numeros);

echo "<b>rsort() - Descendente:</b><br>";
print_r($numeros);


// ================================
// ARRAY ASOCIATIVO
// ================================

$edades = array(
    "Siu" => 24,
    "Sían" => 29,
    "Vero" => 21,
    "Stella" => 23
);

echo "<h3>Array asociativo original:</h3>";
print_r($edades);

echo "<br><br>";

// Ordenar por valores de menor a mayor
asort($edades);

echo "<b>asort() - Valores ascendente:</b><br>";
print_r($edades);

echo "<br><br>";

// Ordenar por valores de mayor a menor
arsort($edades);

echo "<b>arsort() - Valores descendente:</b><br>";
print_r($edades);

echo "<br><br>";

// Ordenar por claves alfabéticamente
ksort($edades);

echo "<b>ksort() - Claves ascendente:</b><br>";
print_r($edades);

echo "<br><br>";

// Ordenar por claves alfabéticamente al revés
krsort($edades);

echo "<b>krsort() - Claves descendente:</b><br>";
print_r($edades);


// Reemplaza una palabra especifica por otrra igual de especifica.
// str_replace


echo "<br><br>";

$texto = "Me gustan las papitas";

echo "Texto cambiadito: " . $texto . "<br>";

$nuevoTexto = str_replace("papitas", "luciernagas", $texto);

echo "<br><br>";


// Sustituye carácter a carácter, la cadena original
// no sufre ninguna modificación
// strtr

$texto = "Hola munditoo";

echo "Texto original: " . $texto . "<br>";

$nuevoTexto = strtr($texto, "Hola", "Patitos");

echo "Texto modificado: " . $nuevoTexto . "<br>"

// 


$str = "Is youy name O'Reilly?";


?>
