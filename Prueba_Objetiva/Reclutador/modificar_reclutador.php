 <?php
include '../conexion.php';
?>
<!DOCTYPE html>
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



<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>


  body{
    background-color: #091937;
    color: black;
    margin: 5%;
  }

input {
    color: black;
}

H1 {
    color: black;
}

input:focus, textarea:focus {
    /* Para dar un pequeño destaque en elementos activos*/
    border-color: #000;
}

form {
    /* Sólo para centrar el formulario a la página */
    margin: 0 auto;
    width: 400px;
    /* Para ver el borde del formulario */
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
}

form div+div {
    margin-top: 1em;
}

input {
    background: silver;
    border: 1px solid #393939;
    border-radius: 5px 5px 5px 5px;
    color: #393939;
    font-size: 12px;
    padding: 5px;
}

.btn {
    width: 150px;
}
  </style>
</head>
<body>
<center>
      <h1>
       Reclutador</h1>
</center>

<?php
$id     = $_REQUEST['id'];
    $query  = "SELECT Id_Reclutador, Nombre_r, apellido_r, correo, Pass from reclutador where Id_Reclutador = '$id'";
    $result = $conexion->query($query);
    ?>


<form action=""  method="POST" enctype="multipart/form-data">
<div class="box-body">
  <?php
while ($row = $result->fetch_array()) {

        ?>

      <input type="hidden" name="id" value="<?php echo $row['Id_Reclutador']; ?>" >


        <div class="form-group">
        <label >Nombre Reclutador</label>
      <input type="text" name="nombre" value="<?php echo $row['Nombre_r']; ?>" class="form-control" >
    </div>

     <div class="form-group">
        <label >Apellido Reclutador</label>
      <input type="text" name="apellido" value="<?php echo $row['apellido_r']; ?>" class="form-control" >
    </div>

       <div class="form-group">
        <label >Correo Reclutador</label>
      <input type="text" name="correo" value="<?php echo $row['correo']; ?>" class="form-control" >
    </div>

    <div class="form-group">
        <label >Password </label>
      <input type="password"  name="password" value="<?php echo $row['Pass']; ?>" class="form-control" >
    </div>

    </div>




     <div class="box-footer">

    <input type="submit" name="btnenviar" value="Modificar" class="btn btn-success">
    <input type="submit" name="btncerrar" value="Cerrar" class="btn btn-danger">

    </div>

   <?php
}
    ?>
   </div>
</form>



</body>


<?php
if (isset($_POST['btnenviar'])) {
        $id       = $_POST['id'];
        $nombre   = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo   = $_POST['correo'];
        $password = $_POST['password'];

        $query  = "UPDATE reclutador set  Nombre_r='$nombre', Apellido_r='$apellido', correo='$correo', Pass='$password' WHERE Id_Reclutador =  '$id'";
        $result = $conexion->query($query);
        if ($result === true) {
            echo "<script>";
            echo "alert('Modificado con exito!'); ";
            echo "</script>";
            echo "<script>";
            echo "window.location='mostrar_reclutador.php'; ";
            echo "</script>";

        } else {
            echo ('error');
        }

    }
    if (isset($_POST['btncerrar'])) {
        echo "<script>";
        echo "window.location='mostrar_reclutador.php'; ";
        echo "</script>";
    }

    ?>
</html>


<?php
}

?>