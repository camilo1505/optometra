<?php
include("../BDServices.php");
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
  redirect("../../error.php");
exit;
}
$now = time();
if($now > $_SESSION['expire']) {
session_destroy();

echo "<script>alert('su sesion ya termino');</script>";
exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opticas Henao</title>
    <link href="../../css/styles.css" rel="stylesheet">
    
</head>
<?php
    $sql = "SELECT * FROM rol ";
    $result = getData($sql,'root','');
?>
<body>
    <header id="header">
        <div class="container">
            <div class="row t-container">
                <div class="span3">
                  <div class="logo">
                    <a href="../../index.html"><img src="../../logo.png" alt="" ></a>
                    </div>            
                </div>
            
            <div class="span7">
                <div class="row space10"></div>
                    <img src="../../nombre.png" alt="">
                </div>            
        </div>
    </header>
<center>
<h2>Formulario de ingreso a nuevos clientes</h2>
    <div id="container">
        <div class="content">
	<form action="registrar.php" method="post">
        <table class="table">
                <thead>
                    <th scope="col">identificacion Usuario </th>
                    <th scope="col">Nombres </th>
                    <th scope="col">Apellidos </th>
                    <th scope="col">contraseña </th>
                    <th scope="col"> rol </th>
                </thead>
                <tbody>
                    
                    <td><input type="text" name="cedula" placeholder="ej: 1087324517" required="required" ></td>
                    <td><input type="text" name="Nombres" placeholder="ej: Juanes alvaro" required="required" ></td>
                    <td><input type="text" name="Apellidos" placeholder="ej: duarte gonzales " value=""></td>
                    <td><input type="text" name="contraseña" placeholder="ej: 12345" required="required" ></td>
                    <td>
                        <select name="rol">
                            <?php
                                foreach($result as $resultado){
                            ?>
                                <option value="<?php echo $resultado['id_rol'];?>"><?php echo $resultado['rol'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </td>
                </tbody>
            </div>
            </table>
			<button class="btn btn-secondary">Guardar</button>
    </form>
    </div>
    <button class="btn btn-primary" > <a href="../historiasClinicas.php">Volver</a></button>
    </div>
</center>
<html>
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
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script> 
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="../../js/functions.js"></script>
    <script type="text/javascript" defer src="../../js/jquery.flexslider.js"></script>        
</body>
</html>