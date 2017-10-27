<?php
$conexion = new mysqli("localhost", "root", "", "pruebaobjetiva"); //no tiene pass por que mi wampserver no la tiene
if ($conexion) {

} else {
    echo "conexion no exitosa";
}
