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
</html>
<?php
    $sql = "SELECT * FROM usuario ";
    $result = getData($sql,'root','');


?>
<html>
<h2>Formulario de ingreso a nuevos clientes</h2>
    <div id="container">
        <div class="content">
        <table class="table">
            <thead>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre </th>
                <th scope="col">Apellido </th>
                <th scope="col">Rol </th>
            </thead>
            <tbody>
                <?php
                
                foreach($result as $resultado){
                    $rol = $resultado['id_usuario'];
                    $sql = "SELECT * from roles WHERE fk_usuario = '$rol'";
                    $result_roles = getData($sql,'root','');
                    $roles = $result_roles[0]['fk_rol'];
                    $sql = "SELECT * FROM rol WHERE id_rol = '$roles'";
                    $result_rol = getData($sql,'root','');
                    $rol = $result_rol[0]['rol'];
                ?>
                    <html>
                    <form action="eliminar.php" method="post">
                        <tr>
                            <td><input type="text" name="cedula" value="<?php echo $resultado['cedula'];?>" readonly="readonly"></td>
                            <td><p style="color:white;"><?php echo $resultado['nombres'];?></p></td>
                            <td><p style="color:white;"><?php echo $resultado['apellidos'];?></p></td>
                            <td><p style="color:white;"><?php echo $rol;?></p></td>
                            <td><button>eliminar</button> </td>
                        </tr>
                    </form>
                <?php
                }
                ?>
                </tbody>
            </table>
    </div>
    <button class="btn btn-primary" > <a href="../usuarios.php">Volver</a></button>
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
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script> 
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="../js/functions.js"></script>
    <script type="text/javascript" defer src="../js/jquery.flexslider.js"></script>        
</body>
</html>