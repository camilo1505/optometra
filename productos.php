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

          <div class="span9">
            <div class="row space10"></div>
            <img src="nombre.png" alt="" />
            <nav id="nav" role="navigation">
              <a href="#nav" title="Show navigation">Show navigation</a>
              <a href="#" title="Hide navigation">Hide navigation</a>
              <ul class="clearfix">
                <li><a href="index.html" title="">Inicio</a></li>
                <li class="active"><a href="productos.php" title="">Productos</a></li>
                <li><a href="login.html" title="">Iniciar Sesion</a></li>
                <li><a href="contactanos.html" title="">contactenos</a></li>
              </ul>
            </nav>
          </div>
          <div class="row space40"></div>
        </div>
      </div>
    </header>

    <div id="content">
      <div class="container">
        <div class="f-center">
          <h2>Catalogo de Productos</h2>
          <div class="head-info">
            La disponibilidad de los productos listados a continuacion estan
            sujetos a la disponivilidad del producto en la optica, el precio
            puede variar segun el mercado, consulte siempre la disponibilidad
            del producto con el almacen.
          </div>
        </div>
        <div class="f-hr"></div>
        <div class="row space40"></div>
        <div class="row">
          <div class="span12">
            <?php
              include("php/BDServices.php");
              $catalogo = getCatalogo();
              print_r($catalogo);
              echo $catalogo[0]["nombre_producto"]
            ?>
            <?php 
              $col = 0;
              for($contador = 0; $contador <= sizeof($catalogo); $contador++){
                if($col == 3) {
                  $col = 0;
                }
                $col = $col + 1;
            ?>
            <div class="span4">
              <div class="ic-1"><i class="icon-lightbulb"></i></div>
              <div class="title-1"><h4><?php echo $catalogo[$contador]["nombre_producto"] ?></h4></div>
              <div class="text-1"><?php echo $catalogo[$contador]["descripcion"] ?></div>
            </div>
              <div class="row space40"></div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <div class="row space40"></div>
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
