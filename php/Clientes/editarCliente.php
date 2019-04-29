<?php
include("../BDServices.php");
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { } else {
    echo "<script>
            alert('Debe Iniciar Sesion');
            window.location.href='../../login.html';
           </script>";
    exit;
}

$now = time();

if ($now > $_SESSION['expire']) {
    session_destroy();

    echo "<script>
            alert('su sesion ya termino');
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
                                <a class="nav-link" href="../logout.php">Cerrar Sesión<span class="sr-only">(current)</span></a>                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
    </header>
    <?php
    $sql = "SELECT * FROM cliente ";
    $usuarios = getData($sql, 'root', '');

    ?>

    <div id="content">
        <div class="container">
            <div class="jumbotron">
                <button class="btn btn-primary"> <a href="../clientes.php">Volver</a></button>
                <h1>Editar los Clientes.</h1>
                <br>
                <ul class="list-group">
                    <?php
                    foreach ($usuarios as $usuario) {
                        ?>
                        <form action="modificar.php" method="POST">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm">
                                        <h3>Usuario: <?php print($usuario["cedula"]); ?> - <?php print($usuario["nombres"]); ?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="cedula">Cédula: </label>
                                        <input type="text" class="form-control" name="cedula" value="<?php print($usuario["cedula"]); ?>" required>
                                    </div>
                                    <div class="col-sm">
                                        <label for="nombres">Nombres del Usuario</label>
                                        <input type="text" class="form-control" name="nombres" value="<?php print($usuario["nombres"]); ?>" required>
                                    </div>
                                    <div class="col-sm">
                                        <label for="nombres">Apellidos</label>
                                        <input type="text" class="form-control" name="apellidos" value="<?php print($usuario["apellidos"]); ?>" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="fecha">Fecha Nacimiento: </label>
                                        <input type="date" class="form-control" name="fecha" value="<?php print($usuario["nacimiento"]); ?>" required>
                                    </div>
                                    <div class="col-sm">
                                        <label for="ciudad">Ciudad del Cliente:</label>
                                        <input type="text" class="form-control" name="ciudad" value="<?php print($usuario["ciudad"]); ?>" required>
                                    </div>
                                    <div class="col-sm">
                                        <label for="direccion">Dirección de Residencia:</label>
                                        <input type="text" class="form-control" name="direccion" value="<?php print($usuario["direccion"]); ?>" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" class="form-control" name="telefono" value="<?php print($usuario["telefono"]); ?>" required>
                                    </div>
                                    <div class="col-sm">
                                        <label for="celular">Celular:</label>
                                        <input type="text" class="form-control" name="celular" value="<?php print($usuario["celular"]); ?>" required>
                                    </div>
                                    <div class="col-sm">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" name="email" value="<?php print($usuario["correo"]); ?>" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="text" class="form-control" name="id" value="<?php print($usuario["id_cliente"]); ?>" readonly hidden>
                                    </div>
                                    <div class="col-sm"></div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-end">
                                            <input type="submit" class="btn btn-primary" value="Guardar">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </form>
                        <br>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="container">

            <div class="row space40"></div>
            <div class="row">
                <div class="span10">
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
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/functions.js"></script>
    <script type="text/javascript" defer src="../js/jquery.flexslider.js"></script>
</body>

</html>