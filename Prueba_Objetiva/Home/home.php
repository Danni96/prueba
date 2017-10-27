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
    background-color:#091937;
    margin-right: 5%;
    margin-left: 5%;
  }
  .arriba{
    background-color: gray;
  }
  nav{
    background-color: #000;

}
.enlace {
  font-family: verdana, arial, sans-serif;
  font-size: 30pt;


}
.btn.btn-success
{
  width: 290px;
  height: 50px;
  font-size: 25px;
  font-
}
.btn.btn-success:hover{
  font-weight:bold;
}
@media screen and (max-width: 700px) {

        nav {
            height: 150px;
        }
    }
</style>
</head>
<body>
  <div class="arriba">

    <center>    <h1>BIENVENIDOS A SEARCH</h1></center>
 <br>
 <br>
 <br>
  </div>
      <div class="menu_bar"></div>
      <nav>
        <center>
        <div class="pa1">
        <a href="../Reclutador/mostrar_reclutador.php" class="enlace" alt="" >
        <div class="col-md-3 col-sm-6 col-xs-12">
              <span class="btn btn-success">RECLUTADORES&nbsp;&nbsp;</span>
        </div>
        </a>
        </div>

        <div class="pa2">
        <a href="../Opor/mostrar_oportunidad.php" class="enlace" alt="" >
        <div class="col-md-3 col-sm-6 col-xs-12">
          <span class="btn btn-success">&nbsp;&nbsp;OPORTUNIDADES</span>
        </div>
        </a><br><br><br>
        </div>
        </center>
      </nav>

       <h3><a href="../logout.php" class="btn btn-lg btn-primary btn-block" ><span >Cerrar Sesión</span> </a></h3>

</body>
</html>

<?php

}

?>