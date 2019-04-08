<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Opticas Henao</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/bootstrap-override.css" rel="stylesheet" />
    <link href="css/font-awesome/font-awesome.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="css/flexslider.css"
      type="text/css"
      media="screen"
    />
  </head>
  <body>
    <header id="header">
      <div class="container">
        <div class="row t-container">
          <div class="span3">
            <div class="logo">
              <a href="index.html"><img src="logo.png" alt=""/></a>
            </div>
          </div>

          <div class="span7">
            <div class="row space10"></div>
            <img src="nombre.png" alt="" />
            <nav id="nav" role="navigation">
              <a href="#nav" title="Show navigation">Show navigation</a>
              <a href="#" title="Hide navigation">Hide navigation</a>
              <ul class="clearfix">
                <li class="active"><a href="index.html" title="">Inicio</a></li>
                <li><a href="productos.php" title="">Productos</a></li>
                <li><a href="login.html" title="">Iniciar Sesion</a></li>
                <li><a href="contactanos.html" title="">contactenos</a></li>
              </ul>
            </nav>
          </div>
          <div class="row space40"></div>
          <div class="slider1 flexslider">
            <!-- Slider -->
            <ul class="slides">
              <li>
                <img src="ucorpora/img/slider/1.jpg" alt="" />
              </li>
              <li>
                <img src="ucorpora/img/slider/2.jpg" alt="" />
              </li>
              <li>
                <img src="ucorpora/img/slider/3.jpg" alt="" />
              </li>
              <li>
                <img src="ucorpora/img/slider/4.jpg" alt="" />
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <div id="content">
      <div class="container">
        <div class="jumbotron">
          <h1>Edicion de Produductos.</h1>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Producto</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include("php/BDServices.php");
                $productos = getProductos();
                foreach($productos as $producto) {
              ?>
                <tr>
                  <form action="php/productos/editarProducto.php" method="POST">
                    <th scope="row" width="5% "><input type="text" class="form-control" name="ID_producto" value="<?php print ($producto["id_producto"]);?>"readonly></th>
                    <td> <input type="text" class="form-control" name="nombre_producto" value="<?php print($producto["nombre_producto"]); ?>" required></td>
                    <td> <input type="submit" class="btn btn-primary" value="Guardar"> </input> </td>
                  </form>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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