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
$sql = "SELECT * FROM departamento";
$result = getData($sql,'jp', '1234');

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
                                <a class="nav-link" href="../logout.php">Cerrar Sesión<span class="sr-only">(current)</span></a>                                </li>
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
                <button class="btn btn-primary"> <a href="../clientes.php">Volver</a></button>
                <h1>Añada un nuevo Cliente.</h1>
                <form action="registrar.php" method="POST">
                    <div class="row">
                        <div class="col-sm">
                            <label for="cedula">Cédula del Cliente:</label>
                            <input type="text" class="form-control" name="cedula" required>
                        </div>
                        <div class="col-sm">
                            <label for="nombres">Nombres:</label>
                            <input type="text" class="form-control" name="nombres" required>
                        </div>
                        <div class="col-sm">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="fecha">Fecha Nacimiento:</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>
                        <div class="col-sm">
                            <label for="ciudad">Ciudad Residencia:</label>
                            <select name="ciudad">
                            <?php
                            $sql = "SELECT * FROM historia_clinica WHERE fk_cliente = $idCliente";
                            $result = getData($sql,'jp', '1234');
                            foreach ($result as $resultado) {
                                ?>
                                <option value="<?php echo $resultado['id_historia_clinica'];?>"><?php echo $resultado['fecha'];?></option>
                            <?php 
                            }
                        ?>
                        </select>
                        </div>
                        <div class="col-sm">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" name="direccion" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="telefono">Teléfono:</label>
                            <input type="number"  class="form-control" name="telefono">
                        </div>
                        <div class="col-sm">
                            <label for="celular">Celular:</label>
                            <input type="number" class="form-control" name="celular">
                        </div>
                        <div class="col-sm">
                            <label for="email">Email: </label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="disponible">Disponible para Llamadas?:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="disponible" id="disponible1" value="si" checked>
                                <label class="form-check-label" for="disponible1">Si.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="disponible" id="disponible2" value="no">
                                <label class="form-check-label" for="disponible2">No.</label>
                            </div>
                        </div>
                        <div class="col-sm">
                            <label for="gafas">Usa Gafas?: </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gafas" id="gafas1" value="si" checked>
                                <label class="form-check-label" for="gafas1">Si.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gafas" id="gafas2" value="no">
                                <label class="form-check-label" for="gafas2">No.</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <br>
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Content End -->

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