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
    <title>Opticas Henao</title>
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
                        <a class="navbar-brand" href="../../index.html">Opticas Henao</a>
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
                                    <a class="nav-link" href="../../contactanos.html">Contactenos<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a class="nav-link" href="../panel-control.php">Panel de Control<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a class="nav-link" href="../logout.php">Cerrar Sesion<span class="sr-only">(current)</span></a> </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
    </header>
    <br>
    <?php
    $sql = "SELECT * FROM cliente ";
    $result = getData($sql, 'root', '');
    ?>
    <div id="content">
        <div class="container">
            <div class="jumbotron">
                <form action="editarCliente.php" method="post">
                    <div class="d-flex justify-content-center">
                        <label for="fk_cliente"> </label>
                        <select name="fk_cliente">
                            <?php
                            foreach ($result as $resultado) {
                                ?>
                                <option value="<?php echo $resultado['id_cliente']; ?>"><?php echo $resultado['cedula'] . " - " . $resultado['apellidos'] . " " . $resultado['nombres']; ?></option>
                            <?php }
                        ?>
                        </select>
                        <button class="site-btn">Editar Cliente</button>
                    </div>
                </form>
                <br>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary"> <a href="/clientes.php">Volver</a></button>
                </div>
            </div>
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
                    <h3>Address</h3>
                    81 Sunnyvale Street<br>
                    Los Angeles, CA 90185<br>
                    United States<br>
                    <br>
                    <i class="icon-phone"></i>+01 880 555 999<br>
                    <i class="icon-envelope"></i><a href="mailto:support@example.com">support@example.com</a><br>
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
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/functions.js"></script>
    <script type="text/javascript" defer src="../js/jquery.flexslider.js"></script>
</body>

</html>