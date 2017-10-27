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
    body: 5%;
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

      <center>  <h1>
       Agregar Oportunidades </i>&nbsp;
        <small></small>
      </h1>
</center>
      <form action=""  method="POST" enctype="multipart/form-data">
       <div class="box-body">
         <div class="form-group">
          <label for="exampleInputEmail1">Titulo</label><br>
        <input type="text" name="titulo" class="form-control" required="required" >
        </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Rango Salarial</label><br>
        <input type="text"  name="rango"  class="form-control" required="required">
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Detalle</label><br>
               <input type="text"  name="detalle"  class="form-control" required="required">
        </div>

 <div class="form-group">
          <label for="exampleInputEmail1">Contacto - Email</label><br>
       <input type="text"  name="contacto"  class="form-control" required="required">
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Requisitos</label><br>
       <textarea name="requisitos"  class="form-control" required="required"></textarea>
        </div>

         <div class="form-group">
          <label for="exampleInputEmail1">Fecha</label><br>
       <input type="date"  name="fecha"  class="form-control" required="required">
        </div>


         <div class="form-group">
          <label for="exampleInputEmail1">Buscar Imagen</label><br>
        <input type="file" name="file" accept=".jpg" value="Imagen" readonly class="form-control" required="required" >
        </div>




         <div class="box-footer">

          <input type="submit" name="btnenviar" value="Agregar" class="btn btn-lg btn-primary btn-block">
         <a href="mostrar_oportunidad.php" class="btn btn-danger">Cerrar</a>
         </div>
      </div>
      </form>


</body>
</html>


<?php
if (isset($_POST['btnenviar'])) {
        $titulo     = $_POST['titulo'];
        $rango      = $_POST['rango'];
        $detalle    = $_POST['detalle'];
        $contacto   = $_POST['contacto'];
        $requisitos = $_POST['requisitos'];
        $fecha      = $_POST['fecha'];

        $nombre = $_FILES['file']['name'];
        $tipo   = $_FILES['file']['type'];

        $ruta    = $_FILES['file']['tmp_name'];
        $destino = "files_oportunidades/" . $nombre;

        if ($nombre != "") {
            if (copy($ruta, $destino)) {

                $query = "INSERT INTO oportunidades (Titulo, Rango_Salario, Detalle, contacto_email,Requisitos, Fecha, Imagen)
                             VALUES ('$titulo','$rango','$detalle', '$contacto', '$requisitos', '$fecha', '$destino')";
                $result = $conexion->query($query);
                if ($result === true) {
                    echo "<script>";
                    echo "alert('Agregado correctamente'); ";
                    echo "</script>";

                } else {
                    echo ('error');
                }

            } else {

            }

        }

    }
    ?>

<?php

}

?>