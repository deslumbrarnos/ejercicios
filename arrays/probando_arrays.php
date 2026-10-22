<?php

$precios = array('10', '20', '30', '40', '50');

echo array_search('10', $precios);
echo "current: " . current($precios) . "<br>";

echo "next: " . next($precios) . "<br>";

echo "reset: " . reset($precios) . "<br>";

echo "next: " . next($precios) . "<br>";

echo "prev: " . prev($precios) . "<br>";

echo "count: " . count($precios) . "<br>";

echo "key: " . key($precios) . "<br>";

echo "end: " . end($precios) . "<br>";

echo "IN ARRAY: " . in_array('10', $precios) . "<br>";

echo "<pre>";
print_r(array_count_values($precios));
echo "</pre>";

?>


<tr>
    <?php
    $num = array(10,20,30,40,50);
    $num1 = array (10,50,60,80,70);
    $num2 = array (10,50,90,100,70);
    array_intersect($num,$num1,$num2);
    
    ?>
</tr>