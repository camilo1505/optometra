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
    <h2>Formulario Historias Clinicas</h2>
		<br>
		<div class="col-md col-pull">
			<form class="form-class" id="con_form" align="center">
				<div class="row">
					<div class="col-sm-4">
						<h3 style="color: red">Cedula o Nit Paciente</h3>
						<input type="text" name="cedula" placeholder="Cedula o Nit Paciente" required="required">
					</div>
				</div>

				<table class="form-class" >
					<br>
					<div>
						<tr  >
							<td colspan="4">
								<br>
								<h3>Antecedentes Patologicos</h3>
								<br>
							</td>
						</tr>
						<tr>
                            <th>Patologia</th>
							<th>Tratamiento</th>
							<th>Cronicidad</th>
                            <th>Observacion</th>
                        </tr>
						<tr>
							<td><div class="col-sm-12"><input type="text" name="patologia1" placeholder="Patologia" required="required" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="tratamiento1" placeholder="Tratamiento" required="required" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="cronicidad1" placeholder="Cronicidad" required="required" ></div></td>
							<td><div class="col-sm-12"><textarea type="text" name="observacion1" placeholder="Observacion" required="required" ></textarea></div></td>
						</tr>
						<tr>
							<td><div class="col-sm-12"><input type="text" name="patologia2" placeholder="Patologia"></div></td>
							<td><div class="col-sm-12"><input type="text" name="tratamiento2" placeholder="Tratamiento"></div></td>
							<td><div class="col-sm-12"><input type="text" name="cronicidad2" placeholder="Cronicidad"></div></td>
							<td><div class="col-sm-12"><textarea type="text" name="observacion2" placeholder="Observacion"></textarea></div></td>
						</tr>
						<tr>
							<td><div class="col-sm-12"><input type="text" name="patologia3" placeholder="Patologia"></div></td>
							<td><div class="col-sm-12"><input type="text" name="tratamiento3" placeholder="Tratamiento"></div></td>
							<td><div class="col-sm-12"><input type="text" name="cronicidad3" placeholder="Cronicidad"></div></td>
							<td><div class="col-sm-12"><textarea type="text" name="observacion3" placeholder="Observacion"></textarea></div></td>
						</tr>
					</div>	
				</table>
				<table class="form-class">
					<br>
					<div>
						<tr>
							<td colspan="4">
								<br>
								<h3>Informacion Extra</h3>
								<br>
							</td>
						</tr>
						<tr>
							<td></td>
							<th>Av Sin RX</th>
							<th>Estenpeico</th>
							<th>Av Rx Anterior</th>
						</tr>
						<tr>

							<th>Ojo Derecho</th>
							<td><div class="col-sm-12"><input type="text" name="avSinRxOd" placeholder=""></div></td>
							<td><div class="col-sm-12"><input type="text" name="estenpeicoOd" placeholder=""></div></td>
							<td><div class="col-sm-12"><input type="text" name="avRxAnteriorOd" placeholder=""></div></td>
						</tr>
						<tr>

							<th>Ojo Izquierdo</th>
							<td><div class="col-sm-12"><input type="text" name="avSinRxOi" placeholder=""></div></td>
							<td><div class="col-sm-12"><input type="text" name="estenpeicoOi" placeholder=""></div></td>
							<td><div class="col-sm-12"><input type="text" name="avRxAnteriorOi" placeholder=""></div></td>
						</tr>
						<tr>
                    </table>
                    <table class="form-class">
                        <br>
							<td colspan="2">
								<br>
								<br>
								<h3>Refraccion</h3>
								<br>

							</td>
						</tr>

						<tr>
							<th>Ojo Derecho</td>
							<td><div class="col-sm-12"><input type="text" name="refraccionOd"  placeholder=""></div></td>
						</tr>

						<tr>
							<th>Ojo Izquierdo</td>
							<td><div class="col-sm-12"><input type="text" name="refraccionOi"  placeholder=""></div></td>
							</tr>
					</div>	
				</table>
				<table class="form-class">
					<br>
					<div>
						<tr>
							<td colspan="4">
								<br>
								<h3>Antecedentes Patologicos</h3>
								<br>
							</td>
						</tr>
						<tr>
							<td></td>
							<th>ojo Derecho</th>
							<th>ojo Izquierdo</th>
						</tr>
						<tr>
							<th>Papila</th>
							<td><div class="col-sm-12"><input type="text" name="papilaOd" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="papilaOi" ></div></td>
						</tr>
						<tr>
							<th>Excavacion</th>
							<td><div class="col-sm-12"><input type="text" name="excavacionOd" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="excavacionOi" ></div></td>
							
						</tr>
						<tr>
							<th>Retina</th>
							<td><div class="col-sm-12"><input type="text" name="retinaOd" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="retinaOi" ></div></td>
							
						</tr>
						<tr>
							<th>Radio</th>
							<td><div class="col-sm-12"><input type="text" name="radioOd" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="radioOi" ></div></td>
							
						</tr>
						<tr>
							<th>Vaso</th>
							<td><div class="col-sm-12"><input type="text" name="vasoOd" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="vasoOi" ></div></td>
							
						</tr>
						<tr>
							<th>Rav</th>
							<td><div class="col-sm-12"><input type="text" name="ravOd" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="ravOi" ></div></td>
							
						</tr>
						<tr>
							<th>Macula</th>
							<td><div class="col-sm-12"><input type="text" name="maculaOd" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="maculaOi" ></div></td>
							
						</tr>
						<tr>
							<th>Reflejo</th>
							<td><div class="col-sm-12"><input type="text" name="reflejoOd" ></div></td>
							<td><div class="col-sm-12"><input type="text" name="reflejoOi" ></div></td>
							
						</tr>
					</div>	
				</table>
				<br>
				<button class="site-btn">Guardar</button>
			</form>
			<br>
		</div>
    </div>
    </center>
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