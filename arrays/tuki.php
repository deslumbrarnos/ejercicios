<HTML>
    <HEAD>
        <TITTLE> Definición de matrices </TITTLE>
    </HEAD>
    <BODY>
        <H3>Uso del constructor Array()</H3>
        <?php
        $Estad = array(1=>"Alemania", "Austria", 5=> "Belgica");
        ?>
        <TABLE BORDER="1" CELLPAFFING="1" CELLPAFFING="2">
            <TR ALIGN="center">
                <TD> Elemento </TD>
                <?php
                foreach ($Estad as $clave => $valor)
                    echo"<TD>$clave</TD>";
                ?>
            </TR>
            <TR ALIGN="center">
                <TD> Valor </TD>
                <?php
                foreach ($Estad as $clave => $valor)
                    echo "<TD> $valor </TD>";
                ?>
            </TR>
        </TABLE>
    </BODY>
</HTML>