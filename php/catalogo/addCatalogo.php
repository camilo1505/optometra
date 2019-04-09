<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Opticas Henao</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <link href="../../css/bootstrap-override.css" rel="stylesheet" />
    <link href="../../css/font-awesome/font-awesome.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="../../css/flexslider.css"
      type="../../text/css"
      media="../../screen"
    />
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                  <a class="nav-link" href="../panel-control.php">Panel de Control<span
                      class="sr-only">(current)</span></a>
                </li>
                <li>
                  <a class="nav-link" href="../../login.html">Iniciar Sesion<span class="sr-only">(current)</span></a>
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
          <h1>Añada un nuevo Producto al Catalogo.</h1>
                <form action="enviarCatalogo.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm">
                            <label for="referencia">Referencia del Producto:</label>
                            <input type="text" class="form-control" name="referencia" required>
                        </div>
                        <div class="col-sm">
                            <label for="marca">Marca del Producto:</label>
                            <input type="text" class="form-control" name="marca" required>
                        </div>
                        <div class="col-sm">
                            <label for="tipo">Tipo del Producto:</label>
                            <input type="text" class="form-control" name="tipo" required>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm">
                            <label for="imagen">Imagen del Producto:</label>
                            <input type="file" class="form-control" name="imagen" required>
                        </div>
                        <div class="col-sm">
                            <label for="costo">Costo del Producto:</label>
                            <input type="number" class="form-control" name="costo" required>
                        </div>
                        <div class="col-sm">
                            <label for="descripcion">Descripcion del Producto:</label>
                            <input type="textarea" class="form-control" name="descripcion">
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm">
                            <br>
                            <select name="producto" class="selectpicker">
                                <?php
                                    include("../BDServices.php");
                                    $productos = getProductos();
                                    for($i = 0; $i < sizeof($productos); $i++){
                                ?>
                                    <option value="<?php print ($productos[$i]["id_producto"]); ?>"> <?php print ($productos[$i]["nombre_producto"]);?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary">
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
          <div class="span6">
            <div class="logo-footer">
              Design by
              <a href="https://www.freshdesignweb.com">freshDesignweb</a>
            </div>
          </div>
          <div class="span6 right">
            &copy; 2020. All rights reserved.
          </div>
          <div class="span3 offset3">
            <h3>Address</h3>
            81 Sunnyvale Street<br />
            Los Angeles, CA 90185<br />
            United States<br />
            <br />
            <i class="icon-phone"></i>+01 880 555 999<br />
            <i class="icon-envelope"></i
            ><a href="mailto:support@example.com">support@example.com</a><br />
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
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" defer src="js/jquery.flexslider.js"></script>
  </body>
</html>
