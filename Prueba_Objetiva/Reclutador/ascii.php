<?php
function text_to_ascii($cadena)
{
    $cadena = stripslashes($cadena);
    $ascii  = "";
    for ($i = 0; $i < strlen($cadena); $i++) {
        $ascii .= ord(substr($cadena, $i));
        $ascii .= "";
    }
    $ascii = substr($ascii, 0, -1);
    return $ascii;
}
