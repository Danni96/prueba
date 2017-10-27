 <?php
include '../conexion.php';
?>

<?php

session_start();
require '../confing.php';

if (!isset($_SESSION["Id_Reclutador"])) {
    header("Location: ../index.php");
}

$idUsuario = $_SESSION['Id_Reclutador'];

$sql    = "SELECT Id_Reclutador, Nombre_r, Apellido_r FROM reclutador WHERE Id_Reclutador= '$idUsuario'";
$result = $mysqli->query($sql);

$rowU = $result->fetch_assoc();
?>
         <?php if ($_SESSION['Id_Reclutador'] != 0) {
    ?>

<?php
include '../conexion.php';

    $id = $_REQUEST['id'];

    $query  = "DELETE FROM reclutador WHERE Id_Reclutador=$id";
    $result = $conexion->query($query);
    if ($result == true) {

        echo "<script>";
        echo "alert('Eliminado con exito!'); ";
        echo "</script>";
        echo "<script>";
        echo "window.location='mostrar_reclutador.php'; ";
        echo "</script>";

    } else {
        echo ('error');
    }

    ?>


<?php
}

?>