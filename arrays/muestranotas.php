<?php
    function PruebasSinGlobal() {
        $var++;
        echo "Prueba sin gloabl. \$var: ".$var."<br>";
    }
    function PruebaConGlobal () {
        global $var;
        $var++;
        echo "Prueba con global. \$var: ".$var."<br>";
    }
    function PruebaConGlobals () {
        $GLOBALS["var"]++;
        echo "Prueba con GLOBALS. \$var: ".$GLOBALS ["var"]."<br>";
    }

    $var=20; //variable global
    PruebaSinGlobal();
    PruebaConGlobal();
    PruebaConGlobals();
?>

