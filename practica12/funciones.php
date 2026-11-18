<?php
// Función para generar botones de radio (los circulitos)
function generaBotonesRadio($nombre, $arrayOpciones, $valorSeleccionado) {
    $html = "";
    foreach ($arrayOpciones as $etiqueta => $valor) {
        $checked = "";
        if ($valor == $valorSeleccionado) {
            $checked = ' checked="checked"';
        }
        $html .= '<label>' . $etiqueta . '</label><input type="radio" name="' . $nombre . '" value="' . $valor . '"' . $checked . ' />';
    }
    return $html;
}

// Función para generar las cajitas de verificación 
function generaCajasVerificacion($arrayCajas, $valoresSeleccionados) {
    $html = "";
    foreach ($arrayCajas as $caja) {
        $nombre = $caja['nombre'];
        $valor = $caja['valor'];
        $etiqueta = $caja['etiqueta'];
        $checked = "";
        if (isset($valoresSeleccionados[$nombre]) && $valoresSeleccionados[$nombre] == $valor) {
            $checked = ' checked="checked"';
        }
        $html .= '<label>' . $etiqueta . '</label><input type="checkbox" name="' . $nombre . '" value="' . $valor . '"' . $checked . ' />';
    }
    return $html;
}

// Función para generar un select simplecito
function generaSelectSimple($nombre, $arrayOpciones, $valorDefecto) {
    $html = '<select name="' . $nombre . '">';
    foreach ($arrayOpciones as $valor => $texto) {
        $selected = "";
        if ($valor == $valorDefecto) {
            $selected = ' selected="selected"';
        }
        $html .= '<option value="' . $valor . '"' . $selected . '>' . $texto . '</option>';
    }
    $html .= '</select>';
    return $html;
}

// Función para generar un select múltiple (las listas de seleccionarf muchos)
function generaSelectMultiple($nombre, $arrayOpciones, $valoresDefecto) {
    $html = '<select name="' . $nombre . '[]" multiple="multiple">';
    foreach ($arrayOpciones as $valor => $texto) {
        $selected = "";
        if (is_array($valoresDefecto) && in_array($valor, $valoresDefecto)) {
            $selected = ' selected="selected"';
        }
        $html .= '<option value="' . $valor . '"' . $selected . '>' . $texto . '</option>';
    }
    $html .= '</select>';
    return $html;
}
?>