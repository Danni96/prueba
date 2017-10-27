<?php require 'confing.php';?>
<!DOCTYPE html>

<?php

include 'Reclutador/ascii.php';
session_start();

if (isset($_SESSION["Id_Reclutador"])) {
    header("Location: Home/home.php");
}

if (!empty($_POST)) {
    $usuario  = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $error    = '';

    $sha1_pass  = sha1($password);
    $sinespacio = trim($usuario);

    $sql    = "SELECT Id_Reclutador, Nombre_r, Apellido_r, Pass FROM reclutador WHERE  Nombre_r = '$usuario' AND Pass = '$password'";
    $result = $mysqli->query($sql);
    $rows   = $result->num_rows;

    if ($rows > 0) {
        $row = $result->fetch_assoc();

        $nicknameasciibd = text_to_ascii($row['Nombre_r']);
        $passasciibd     = text_to_ascii($row['Pass']);

        $nicknameascii = text_to_ascii($_POST['usuario']);
        $passascii     = text_to_ascii($_POST['password']);

        if ($nicknameascii == $nicknameasciibd && $passascii == $passasciibd) {
            $_SESSION['Id_Reclutador'] = $row['Id_Reclutador'];

            header("location: Home/home.php");
        } else {
            $error = utf8_encode("El nombre o contraseña son incorrectos");
        }
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

  body{
    background-color: #091937;
  }
  container{
    margin-top: 50px;
    margin-bottom: 50px;
  }
  .form-signin{
    margin-top: 50px;
    margin-bottom: 50px;
  }
</style>

</head>
<body>
<center>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" id="div">
            <h1 class="text-center login-title"></h1>
            <div class="account-wall">
              <div class="imagen"  align="center">
                <div class="imgenes" align="center">
                <img class="profile-img" src="img/logo.png" alt="">
                </div>
              </div>

                <form class="form-signin" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <input type="text" class="form-control" placeholder="Usuario"  name="usuario" required autofocus>
                <br/>
                <input type="password" class="form-control" placeholder="Contraseña"  name="password" required><br>
                <input name="login" type="submit"  value="Login" class="btn btn-lg btn-primary btn-block"><br>
                <!--<a href="inicio/home2.php" class="btn btn-danger">Continuar</a>-->
                </form>

                  <div class="login-link" align="center" style="color: #fff;">
                  <?php echo isset($error) ? utf8_decode($error) : ''; ?>
                  </div>
            </div>
        </div>
    </div>
</div>
</center>
</body>
</html>
