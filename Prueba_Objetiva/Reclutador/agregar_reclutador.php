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
    Body:5%;
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
<body class="hold-transition skin-blue sidebar-mini">
  </header>
<center>
      <h1>
       Agregar Reclutador
        <small></small>
      </h1>
</center>

      <form action=""  method="POST" enctype="multipart/form-data">
       <div class="box-body">
         <div class="form-group">
          <label>Nombre Reclutador</label><br>
        <input type="text" name="nombre" class="form-control" required="required" >
        </div>

         <div class="form-group">
          <label>Apellido Reclutador</label><br>
        <input type="text" name="apellido" class="form-control" required="required" >
        </div>

         <div class="form-group">
          <label>Correo</label><br>
        <input type="text" name="correo"   class="form-control" required="required" >
        </div>


         <div class="form-group">
          <label>Password</label><br>
        <input type="password" name="password"  class="form-control" required="required" >
        </div>


        </div>




         <div class="box-footer">

          <input type="submit" name="btnenviar" value="GUardar" class="btn btn-lg btn-primary btn-block"><br>
          <a href="mostrar_reclutador.php" class="btn btn-danger">Cerrar</a>



         </div>
      </div>
      </form>

</body>
</html>

<?php
if (isset($_POST['btnenviar'])) {
        $nombre   = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo   = $_POST['correo'];
        $password = $_POST['password'];

        $query = "INSERT INTO reclutador (Nombre_r, Apellido_r, correo, Pass)
                             VALUES ('$nombre','$apellido','$correo', '$password')";
        $result = $conexion->query($query);
        if ($result === true) {
            echo "<script>";
            echo "alert('Reclutador agregado correctamente!'); ";
            echo "</script>";

        } else {
            echo ('error');
        }

    }

    ?>

<?php
}

?>