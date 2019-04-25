<?php
include("../BDServices.php");
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { } else {
    redirect("../../error.php");
    exit;
}

$now = time();

if ($now > $_SESSION['expire']) {
    session_destroy();

    echo "<script>alert('su sesion ya termino');</script>";
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

<?php
$sql = "SELECT * FROM rol ";
$result = getData($sql, 'root', '');
?>

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
                                    <a class="nav-link" href="../logout.php">Cerrar Sesión<span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
    </header>

    <div id="content">
        <div class="container">
            <div class="jumbotron">
                <button class="btn btn-primary"> <a href="../usuarios.php">Volver</a></button>
                <h1>Ingresar un Nuevo Usuario.</h1>
                <form action="registrar.php" method="post">
                    <div class="row">
                        <div class="col-sm">
                            <label for="cedula">Documento de Identidad:</label>
                            <input type="text" class="form-control" name="cedula" required>
                        </div>
                        <div class="col-sm">
                            <label for="Nombres">Nombres del Usuario:</label>
                            <input type="text" class="form-control" name="Nombres">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Apellidos">Apellidos del Usuario:</label>
                            <input type="text" class="form-control" name="Apellidos">
                        </div>
                        <div class="col-sm">
                            <label for="contraseña">Contraseña:</label>
                            <input type="password" class="form-control" name="contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <br>
                            <label for="rol"> Seleccione un Rol: </label>
                            <select name="rol" class="selectpicker" require>
                                <?php
                                foreach ($result as $resultado) {
                                    ?>
                                    <option value="<?php echo $resultado['id_rol']; ?>"><?php echo $resultado['rol']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm">
                            <br>
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="container">

            <div class="row space40"></div>
            <div class="row">
                <div class="span6">
                    <div class="logo-footer">
                        Design by <a href="https://www.freshdesignweb.com">freshDesignweb</a>
                    </div>
                </div>
                <div class="span6 right">
                    &copy; 2020. All rights reserved.
                </div>
                <div class="span3 offset3">
                <h3>Dirección</h3>
                    Calle 69 Bis número 25B-16<br />
                    Cuba - Pereira<br />
                    Colombia <br />
                <h3>Contacto</h3>
                    <i class="icon-phone"></i>+6 3374294<br />
                    <i class="icon-envelope"></i><a href="mailto:support@example.com">support@example.com</a><br />
                    <i class="icon-home"></i><a href="#">www.example.com</a>

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
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/functions.js"></script>
    <script type="text/javascript" defer src="../../js/jquery.flexslider.js"></script>
</body>

</html>