<?php
include("../BDServices.php");
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { } else {
  echo "<script>
            alert('Inicie Sesion para Continuar');
            window.location.href='../../login.html';
        </script>";
  exit;
}

$now = time();

if ($now > $_SESSION['expire']) {
  session_destroy();

  echo "  <script>
            alert('La Sesion ha expirado');
            window.location.href='../../login.html';
          </script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ópticas Henao</title>
  <link href="../../css/styles.css" rel="stylesheet" />
  <link href="../../css/bootstrap-override.css" rel="stylesheet" />
  <link href="../../css/font-awesome/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/flexslider.css" type="../../text/css" media="../../screen" />
</head>

<body>
<header id="header">
    <div class="container">
      <div class="row t-container">
        <div class="span3">
          <div class="logo">
            <a href="../../index.html"><img src="../../logo.png" alt="" /></a>
          </div>
        </div>
        <div class="span7">
          <div class="row space10"></div>
          <img src="../../nombre.png" alt="">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../../index.html">Ópticas Henao</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="../../index.html">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li>
                  <a class="nav-link" href="../../productos.php">Productos<span class="sr-only">(current)</span></a>
                </li>
                <li>
                  <a class="nav-link" href="../../contactanos.html">Contáctenos<span class="sr-only">(current)</span></a>
                </li>
                <li>
                  <a class="nav-link" href="../panel-control.php">Panel de Control<span class="sr-only">(current)</span></a>
                </li>
                <li>
                <a class="nav-link" href="../logout.php">Cerrar Sesión<span class="sr-only">(current)</span></a>                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
  </header>

    <br>

    <div id="content">
        <div class="container">
            <div class="jumbotron">
                <h1>Eliminar Clientes.</h1>
                <br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $sql = "SELECT cliente.id_cliente, cliente.cedula, cliente.nombres, cliente.apellidos, cliente.direccion, cliente.telefono, cliente.celular, cliente.correo
                                     FROM cliente";
                            $usuarios = getData($sql,'jp', '1234');

                            foreach($usuarios as $usuario) {
                        ?>
                            <tr>
                                <form action="eliminar.php" method="POST">
                                    <th scope="row" width="5% "><input type="text" class="form-control" name="id_cliente" value="<?php print ($usuario["id_cliente"]);?>"readonly></th>
                                    <td scope="row" width="11% "><input type="text" class="form-control" name="cedula" value="<?php print ($usuario["cedula"]);?>"required></td>
                                    <td width="15%"> <input type="text" class="form-control" name="nombres" value="<?php print($usuario["nombres"]); ?>" required></td>
                                    <td scope="row" width="11% "><input type="text" class="form-control" name="apellidos" value="<?php print ($usuario["apellidos"]);?>"required></td> 
                                    <td scope="row" width="11% "><input type="text" class="form-control" name="direccion" value="<?php print ($usuario["direccion"]);?>"required></td>
                                    <td scope="row" width="11% "><input type="text" class="form-control" name="telefono" value="<?php print ($usuario["telefono"]);?>"required></td>
                                    <td scope="row" width="11% "><input type="text" class="form-control" name="celular" value="<?php print ($usuario["celular"]);?>"required></td>
                                    <td scope="row" width="11% "><input type="text" class="form-control" name="correo" value="<?php print ($usuario["correo"]);?>"required></td>
                                    <td> <input type="submit" class="btn btn-primary" value="Eliminar"> </input> </td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-primary"> <a href="../usuarios.php">Volver</a></button>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="row space50"></div>
            <div class="row">
                <div class="span10">
                    <div class="logo-footer">
                    <center><h3>Ópticas Henao está en todo el centro de Cuba - Pereira. Te  hacemos el examen visual computarizado, elaborado por un profesional optometrista, ofreciéndoles gran variedad de   monturas y  lentes. Visítenos sin ningún compromiso en nuestro local o en la página</h3></center>
            </div>
          </div>
          <div class="span10 right">
                    </div>
          <div class="span3 offset3">
            <h3>Contacto</h3>
            Dirección: Calle 69Bis número 25B-16<br>
            Cuba - Pereira<br>
            Colombia<br>
            <br>
            <i class="icon-phone"></i>6 3374294 <br>
            <i class="icon-envelope"></i><a href="mailto:support@example.com">opticashenao@gmail.com</a><br>
            <i class="icon-home"></i><a href="#">www.opticashenao.com</a>


                    <div class="row space40"></div>

                    <a href="#" class="social-network sn2 behance"></a>
                    <a href="#" class="social-network sn2 facebook"></a>
                    <a href="#" class="social-network sn2 pinterest"></a>
                    <a href="#" class="social-network sn2 flickr"></a>
                    <a href="#" class="social-network sn2 dribbble"></a>
                    <a href="#" class="social-network sn2 lastfm"></a>
                    <a href="#" class="social-network sn2 forrst"></a>
                    <a href="#" class="social-network sn2 xing"></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <!-- JavaScripts -->
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" defer src="js/jquery.flexslider.js"></script>
</body>

</html>