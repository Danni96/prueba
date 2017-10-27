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
.tabla {
        margin: 0px;
        padding: 0px;
        width: 90%;
        border: 2px solid #000;
        margin-top: 50px;
        white-space: nowrap;
        overflow: hidden;
        /* cualquier valor excepto "visible" para que funcione. */
        text-overflow: ellipsis;
        -moz-border-radius-bottomleft: 5px;
        -webkit-border-bottom-left-radius: 5px;
        border-bottom-left-radius: 5px;
        -moz-border-radius-bottomright: 5px;
        -webkit-border-bottom-right-radius: 5px;
        border-bottom-right-radius: 5px;
        -moz-border-radius-topright: 5px;
        -webkit-border-top-right-radius: 5px;
        border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -webkit-border-top-left-radius: 5px;
        border-top-left-radius: 5px;
    }

    .tabla table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
    }

    .tabla tr:last-child td:last-child {
        -moz-border-radius-bottomright: 0px;
        -webkit-border-bottom-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .tabla table tr:first-child td:first-child {
        -moz-border-radius-topleft: 0px;
        -webkit-border-top-left-radius: 0px;
        border-top-left-radius: 0px;
    }

    .tabla table tr:first-child td:last-child {
        -moz-border-radius-topright: 0px;
        -webkit-border-top-right-radius: 0px;
        border-top-right-radius: 0px;
    }

    .tabla tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 0px;
        -webkit-border-bottom-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }

    .tabla tr:hover td {}

    .tabla tr:nth-child(odd) {
        background-color: #6699cc;
    }

    .tabla tr:nth-child(even) {
        background-color: #ffffff;
    }

    .tabla td {
        vertical-align: middle;
        border: 1px solid #ffffff;
        border-width: 0px 1px 1px 0px;
        text-align: left;
        padding: 9px;
        font-size: 14px;
        font-family: Arial;
        font-weight: normal;
        color: #000000;
    }

    .tabla tr:last-child td {
        border-width: 0px 1px 0px 0px;
    }

    .tabla tr td:last-child {
        border-width: 0px 0px 1px 0px;
    }

    .tabla tr:last-child td:last-child {
        border-width: 0px 0px 0px 0px;
    }

    .tabla tr:first-child td {
        background: -o-linear-gradient(bottom, #003366 5%, #003366 100%);
        background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #003366), color-stop(1, #003366));
        background: -moz-linear-gradient( center top, #003366 5%, #003366 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#003366", endColorstr="#003366");
        background: -o-linear-gradient(top, #003366, 003366);
        background-color: #003366;
        border: 0px solid #ffffff;
        text-align: center;
        border-width: 0px 0px 1px 1px;
        font-size: 18px;
        font-family: Arial;
        font-weight: bold;
        color: #ffffff;
    }

    .tabla tr:first-child:hover td {
        background: -o-linear-gradient(bottom, #003366 5%, #003366 100%);
        background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #003366), color-stop(1, #003366));
        background: -moz-linear-gradient( center top, #003366 5%, #003366 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#003366", endColorstr="#003366");
        background: -o-linear-gradient(top, #003366, 003366);
        background-color: #003366;
    }

    .tabla tr:first-child td:first-child {
        border-width: 0px 0px 1px 0px;
    }

    .tabla tr:first-child td:last-child {
        border-width: 0px 0px 1px 1px;
    }
    td.action{
      color: black;
    }

</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">



      <h1>
      Oportunidades</i>&nbsp;
        <small></small>
      </h1>
      <a href="../Home/home.php" class="btn btn-primary">Inicio</a>
      <a href="agregar_oportunidad.php" class="btn btn-primary">Agregar Nuevo</a>


<?php
$query  = "SELECT Id_Oportunidad, Titulo, Rango_Salario, Detalle, contacto_email,Requisitos, Fecha, Imagen from oportunidades ";
    $result = $conexion->query($query);
    ?>
<table id="example1" class="tabla">
  <thead >
  <tr>
    <th>Titulo</th>
    <th>Rango Salarial</th>
    <th>Detalle</th>
    <th>Contacto</th>
    <th>Requisitos</th>
    <th>Fecha</th>
    <th>Imagen</th>
    <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
   <?php
while ($row = $result->fetch_array()) {

        ?>
  <tr>
    <td><?php echo $row['Titulo'] ?></td>
    <td><?php echo $row['Rango_Salario'] ?></td>
    <td><?php echo $row['Detalle'] ?></td>
    <td><?php echo $row['contacto_email'] ?></td>
    <td><?php echo $row['Requisitos'] ?></td>
    <td><?php echo $row['Fecha'] ?></td>
    <td> <img style="width: 120px; max-height: 120px;" class="img-responsive" src="<?php echo $row['Imagen'] ?>"> </td>


</td>


       <td>
    <a href="modificar_oportunidad.php?id=<?php echo $row['Id_Oportunidad']; ?>">
    <i class="btn btn-danger" class="fa fa-pencil-square-o fa-2x" aria-hidden="true">modificar</i>
    </a>
    <a href="#"  onclick="Borra('<?php echo $row['Id_Oportunidad']; ?>')" >
    <i class="btn btn-danger" class="fa fa-trash-o fa-2x" aria-hidden="true">eliminar</i>
    </a>

    </td>

  </tr>
   <?php
}

    ?>
    </tbody>
</table>

<script language="JavaScript">
  function Borra(id)
  {
  var agree=confirm("¿Desea eliminar este registro?");
  if (agree) { document.location="eliminar_oportunidad.php?id="+id; }
  else return false ;
  }
</script>


</body>
</html>



<?php
}

?>