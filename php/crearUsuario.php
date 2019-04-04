<?php
include("BDServices.php");
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
  redirect("../error.php");
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
    <link href="../css/styles.css" rel="stylesheet">
    
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="row t-container">
                <div class="span3">
                  <div class="logo">
                    <a href="../index.html"><img src="../logo.png" alt="" ></a>
                    </div>            
                </div>
            
            <div class="span7">
                <div class="row space10"></div>
                    <img src="../nombre.png" alt="">
                </div>            
        </div>
    </header>
          
<?php
//if ($_SESSION['tipoUsuario'] == "cliente"){
    if (1==1){
?>
<center>
<h2>Formulario de ingreso a nuevos clientes</h2>
    <div id="container">
        <div class="content">
	<form action="php/registrar-usuario.php" method="post">
        <table class="table">
                <thead>
                    <th scope="col">Cedula o Nit Cliente </th>
                    <th scope="col">Primer Nombre </th>
                    <th scope="col">Segundo Nombre </th>
                    <th scope="col">Primer Apellido </th>
                    <th scope="col">Segundo Apellido </th>
                    <th scope="col"> Edad </th>
                </thead>
                <tbody>
                    <td><input type="number" name="edad" placeholder="ej : 12" required="required"></td>
                    <td><input type="text" name="cedula" placeholder="ej: 1087324517" required="required" ></td>
                    <td><input type="text" name="primerNombre" placeholder="ej: Juan" required="required" ></td>
                    <td><input type="text" name="segundoNombre" placeholder="ej: Carlos" value=""></td>
                    <td><input type="text" name="primerApellido" placeholder="ej: Ramirez" required="required" ></td>
                    <td><input type="text" name="segundoApellido" placeholder="ej: Sanchez" value=""></td>

                </tbody>
            </div>
            <thead>
                <th scope="col"> Ciudad </th>
                <th scope="col"> Direccion </th>
                <th scope="col"> Telefono </th>
                <th scope="col"> Celular </th>
                <th scope="col"> Correo Electronico </th>
            </thead>
            <tbody>
                <td><input type="text" name="ciudad" placeholder="ej: Pereira" required="required"></td>
                <td><input type="text" name="direccion" placeholder="ej: barrio alamos mz 6 cs 28" value=""></td>
                <td><input type="number" name="telefono" placeholder="ej: 3502742" value=""></td>    
                <td><input type="number" name="celular" placeholder="ej : 312 3222 222" value=""></td>
                <td><input type="text" name="email" placeholder="ej: besto@gmail.com" value=""></td>  
   
            </tbody>
            <thead>
                <th scope="col"> Disponible para llamadas? </th>
                <th scope="col"> usa Gafas? </th>
            </thead>
            <tbody>                  
                <td><input type="checkbox" name="disponibleLlamadas" required="required"></td>
                <td><input type="checkbox" name="usaGafas" required="required"></td> 
            </tbody>
        </table>
			<button class="site-btn">Guardar</button>
    </form>
    </div>
    </div>
</center>
<?php	
}

?>
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
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script> 
    <script type="text/javascript" src="js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" defer src="js/jquery.flexslider.js"></script>        
</body>
</html>