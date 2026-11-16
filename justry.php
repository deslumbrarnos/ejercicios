<?php
if (isset($_POST['enviar'])) {
    $nombre=$_POST['usuario'];
    $foto=$_POST['foto'];
    $errores=array(false, false);
    if (empty($nombre))
    $errores [0]=true;
}
else {

}
 
?>