<?php
include("php/BDServices.php");
$busqueda = $_GET['busqueda'];
$sql = "SELECT * FROM catalogo WHERE fk_producto = '$busqueda'";
$catalogo = getData($sql, 'jp', '1234');
$sql = "SELECT * FROM producto";
$productoAux = getData($sql, 'root', '');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ópticas Henao</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/bootstrap-override.css" rel="stylesheet" />
  <link href="css/font-awesome/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>

<body>
  <header id="header">
    <div class="container">
      <div class="row t-container">
        <div class="span3">
          <div class="logo">
            <a href="index.html"><img src="logo.png" alt="" /></a>
          </div>
        </div>
        <div class="span7">
          <div class="row space10"></div>
          <img src="nombre.png" alt="">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">Ópticas Henao</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li>
                  <a class="nav-link" href="index.html">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="productos.php">Productos<span class="sr-only">(current)</span></a>
                </li>
                <li>
                  <a class="nav-link" href="contactanos.html">Contáctenos<span class="sr-only">(current)</span></a>
                </li>
                <li>
                  <a class="nav-link" href="php/panel-control.php">Panel de Control<span class="sr-only">(current)</span></a>
                </li>
                <li>
                  <a class="nav-link" href="login.html">Iniciar Sesión<span class="sr-only">(current)</span></a>
                </li>
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
        <h1>Catálogo de Productos.</h1>
        <div class="d-flex flex-row">
          <form action="busqueda.php" method="GET">
            <div class="d-flex flex-row">
              <div class="p-2">
                <label for="busqueda">Tipo de Producto: </label>
                <select name="busqueda" class="selectpicker" required>
                  <?php
                  $productos = getProductos();
                  for ($i = 0; $i < sizeof($productos); $i++) {
                    ?>
                    <option value="<?php print($productos[$i]["id_producto"]); ?>"> <?php print($productos[$i]["nombre_producto"]); ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="p-2">
                <input type="submit" class="btn btn-primary" value="Buscar">
              </div>
            </div>
          </form>
          <form action="promociones.php">
            <div class="p-2">
              <input type="submit" class="btn btn-primary" value="Promociones">
            </div>
          </form>
        </div>
        <br>
        <br>
        <?php
        $contador = 0;
        foreach ($catalogo as $producto) {
          if ($contador === 0) {
            print('<div class="d-flex flex-row">');
          }
          ?>
          <div class="p-2">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php print($producto["imagen"]); ?>" alt="Card image cap" height="200" width="400">
              <div class="card-body">
                <p class="card-title"> <?php
                                        foreach ($productoAux as $aux) {
                                          if ($producto["fk_producto"] == $aux["id_producto"]) {
                                            print($aux["nombre_producto"]);
                                          }
                                        }
                                        ?> </p>
                <p class="card-text">Referencia: <?php print($producto["referencia"]); ?> </p>
                <p class="card-text">Marca: <?php print($producto["marca"]); ?> </p>
                <p class="card-text">Costo: $<?php print(number_format($producto["costo"], $decimals = 0, $dec_point = ",", $thousands_sep = ".")); ?> </p>
                <p class="card-text"> <?php print($producto["descripcion"]); ?> </p>
              </div>
            </div>
          </div>
          <?php
          if ($contador >=  2) {
            print('</div>');
            print('<br>');
            $contador = 0;
          } else {
            $contador += 1;
          }
        }
        ?>
      </div>
    </div>
  </div>

  <div class="row space40"></div>

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
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/functions.js"></script>
  <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" defer src="js/jquery.flexslider.js"></script>
</body>

</html>