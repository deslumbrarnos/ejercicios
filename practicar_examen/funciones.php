<?php
// Genera botones de radio manteniendo el seleccionado
function generaBotonesRadio(string $nombre, array $opciones, string $seleccionado = ''): string {
    $html = '';
    foreach ($opciones as $etiqueta => $valor) {
        $checked = ($valor === $seleccionado) ? 'checked' : '';
        $html .= "<label>$etiqueta</label><input type=\"radio\" name=\"$nombre\" value=\"$valor\" $checked />\n";
    }
    return $html;
}

// Genera cajas de verificación (checkbox) independientes
// $elementos recibe un array asociativo: ['name' => ['etiqueta' => '...', 'valor' => '...']]
function generaCajasVerificacion(array $elementos, array $datosEnviados = []): string {
    $html = '';
    foreach ($elementos as $nombre => $info) {
        $etiqueta = $info['etiqueta'];
        $valor = $info['valor'];
        $checked = (isset($datosEnviados[$nombre]) && $datosEnviados[$nombre] === $valor) ? 'checked' : '';
        $html .= "<label>$etiqueta</label><input type=\"checkbox\" name=\"$nombre\" value=\"$valor\" $checked />\n";
    }
    return $html;
}

// Genera un <select> simple
function generaSelectSimple(string $nombre, array $opciones, string $seleccionado = ''): string {
    $html = "<select name=\"$nombre\">\n";
    foreach ($opciones as $etiqueta => $valor) {
        $selected = ($valor === $seleccionado) ? 'selected' : '';
        $html .= "    <option value=\"$valor\" $selected>$etiqueta</option>\n";
    }
    $html .= "</select>\n";
    return $html;
}

// Genera un <select multiple> (se añade [] al name para que PHP reciba un array)
function generaSelectMultiple(string $nombre, array $opciones, array $seleccionados = []): string {
    $html = "<select name=\"{$nombre}[]\" multiple>\n";
    foreach ($opciones as $etiqueta => $valor) {
        $selected = in_array($valor, $seleccionados) ? 'selected' : '';
        $html .= "    <option value=\"$valor\" $selected>$etiqueta</option>\n";
    }
    $html .= "</select>\n";
    return $html;
}
?>