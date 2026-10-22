<?php

$semana = array(
    'lunes',
    'martes',
    'miercoles',
    'jueves',
    'viernes',
    'viernes',
    'sabado',
    'viernes',
    'domingo',
    'lunes',
    'viernes'
);

$semana = array_diff($semana, array('viernes'));

echo "<pre>";

print_r($semana);

echo "</pre>";

?>
