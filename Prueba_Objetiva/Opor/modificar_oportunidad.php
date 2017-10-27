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
<body class="hold-transition skin-blue sidebar-mini">
<center>
      <h1>
       Oportunidad
      </h1>
</center>


<?php
$id     = $_REQUEST['id'];
    $query  = "SELECT Id_Oportunidad, Titulo, Rango_Salario, Detalle, contacto_email,Requisitos, Fecha, Imagen  from oportunidades where Id_Oportunidad = '$id'";
    $result = $conexion->query($query);
    ?>
<form action=""  method="POST" enctype="multipart/form-data">
<div class="box-body">
  <?php
while ($row = $result->fetch_array()) {

        ?>
      <input type="hidden" name="id" value="<?php echo $row['Id_Oportunidad']; ?>" >


        <div class="form-group">
        <label for="exampleInputEmail1">Titulo</label><br>
      <input type="text" name="titulo" value="<?php echo $row['Titulo']; ?>" class="form-control" >
    </div>

           <div class="form-group">
          <label for="exampleInputEmail1">Rango Salarial</label><br>
        <input type="text"  name="rango" value="<?php echo $row['Rango_Salario']; ?>"  class="form-control" required="required">
        </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Detalle </label><br>
      <input type="text"  name="detalle" value="<?php echo $row['Detalle']; ?>" class="form-control" >
    </div>

<div class="form-group">
          <label for="exampleInputEmail1">Contacto - Email</label><br>
       <input type="text"  name="contacto"  class="form-control" value="<?php echo $row['contacto_email']; ?>" required="required">
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Requisitos</label><br>
       <textarea name="requisitos"  class="form-control"  required="required"><?php echo $row['Requisitos']; ?> </textarea>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Fecha</label><br>
    <input type="date"  name="fecha" value="<?php echo $row['Fecha']; ?>"  class="form-control" required="required">
        </div>


         <div class="form-group">
          <label for="exampleInputEmail1">Buscar Imagen</label><br>
        <input type="file" name="file" accept=".jpg" value="Imagen" readonly class="form-control" required="required" >
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
        $id = $_POST['id'];

        $titulo     = $_POST['titulo'];
        $rango      = $_POST['rango'];
        $detalle    = $_POST['detalle'];
        $contacto   = $_POST['contacto'];
        $requisitos = $_POST['requisitos'];
        $fecha      = $_POST['fecha'];

        $nombre  = $_FILES['file']['name'];
        $tipo    = $_FILES['file']['type'];
        $tamanio = $_FILES['file']['size'];
        $ruta    = $_FILES['file']['tmp_name'];
        $destino = "files_oportunidades/" . $nombre;

        if ($nombre != "") {
            if (copy($ruta, $destino)) {

                $query  = "UPDATE oportunidades set Titulo='$titulo', Rango_Salario ='$rango', Detalle='$detalle', contacto_email='$contacto', Requisitos ='$requisitos', Fecha='$fecha', Imagen= '$destino' where Id_Oportunidad= '$id' ";
                $result = $conexion->query($query);
                if ($result === true) {

                    echo "<script>";
                    echo "alert('Modificacion exitosa!'); ";
                    echo "</script>";
                    echo "<script>";
                    echo "window.location='mostrar_oportunidad.php' ";

                    echo "</script>";

                } else {
                    echo ('erro');
                }

            } else {
                echo "<script>";
                echo "alert('The file have an error in the name, please try with other file...'); ";
                echo "</script>";
                echo "<script>";
                echo "window.location='mostrar_oportunidad.php'";
                echo "</script>";
            }

        } else if ($nombre == "") {

            $query  = "UPDATE oportunidades set Titulo='$titulo', Rango_Salario ='$rango', Detalle='$detalle', contacto_email='$contacto', Requisitos ='$requisitos', Fecha='$fecha' where Id_Oportunidad = '$id' ";
            $result = $conexion->query($query);
            if ($result === true) {
                echo "<script>";
                echo "alert('Modificacion exitosa!'); ";
                echo "</script>";

                echo "<script>";
                echo "window.location='mostrar_oportunidad.php' ";

                echo "</script>";

            } else {
                echo ('error');
            }

        }

    }

    if (isset($_POST['btncerrar'])) {
        echo "<script>";
        echo "window.location='mostrar_oportunidad.php'; ";
        echo "</script>";
    }
    ?>
</html>


<?php
}

?>