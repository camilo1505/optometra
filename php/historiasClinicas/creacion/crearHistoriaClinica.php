<?php
include("../../BDServices.php");
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { } else {
	echo "<script>
            alert('Inicie Sesion para Continuar');
            window.location.href='../../../login.html';
        </script>";
	exit;
	exit;
}

$now = time();

if ($now > $_SESSION['expire']) {
	session_destroy();

	echo "<script>
            alert('Inicie Sesion para Continuar');
            window.location.href='../../../login.html';
        </script>";
	exit;
	exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Ópticas Henao</title>
	<link href="../../../css/styles.css" rel="stylesheet" />
	<link href="../../../css/bootstrap-override.css" rel="stylesheet" />
	<link href="../../../css/font-awesome/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="../../../css/flexslider.css" type="../../../text/css" media="../../../screen" />
</head>
<?php
$cliente = $_GET['fk_cliente'];
$sql = "SELECT * FROM cliente WHERE id_cliente = '$cliente'";
$datosClientes = getData($sql, 'root', '');
$sql = "SELECT *
			 FROM usuario, roles, rol
       WHERE roles.fk_usuario = 2
       AND roles.fk_usuario = usuario.id_usuario
			 AND roles.fk_rol = rol.id_rol";
$datosMedico = getData($sql, 'root', '');
$nacimiento = $datosClientes[0]['nacimiento'];
$ano = date("Y", strtotime($nacimiento)); 
$fecha_actual = date("Y");
$edad = $fecha_actual - $ano;

?>

<body>
<header id="header">
        <div class="container">
            <div class="row t-container">
                <div class="span3">
                    <div class="logo">
                        <a href="../../../index.html"><img src="../../../logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="span7">
                    <div class="row space10"></div>
                    <img src="../../../nombre.png" alt="">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="../../../index.html">Ópticas Henao</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="../../../index.html">Inicio<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a class="nav-link" href="../../../productos.php">Productos<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a class="nav-link" href="../../../contactanos.html">Contáctenos<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a class="nav-link" href="../../panel-control.php">Panel de Control<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a class="nav-link" href="../../logout.php">Cerrar Sesión<span class="sr-only">(current)</span></a>
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
				<h1>Crear Historia Clínica de: <b style="color:red;"> <?php print($datosClientes[0]['apellidos'] . " " . $datosClientes[0]['nombres']); ?></b>.</h1>
				<br>
				<form action="registrar.php" method="post">
					<div class="row">
						<div class="col-sm">
							<label for="fk_cliente">Cédula Cliente:</label>
							<input type="text" class="form-control" name="fk_cliente" value="<?php print($datosClientes[0]["cedula"]); ?>" readonly>
						</div>
						<div class="col-sm">
							<label for="fk_cliente">Edad Cliente:</label>
							<input type="text" class="form-control" name="edad_cliente" value="<?php print($edad); ?>" readonly>
						</div>
						<div class="col-sm">
							<label for="fk_usuario">Cédula Optometra: </label>
							<input type="text" class="form-control" name="fk_usuario" value="<?php echo $_SESSION['cedula']; ?>" readonly>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="patologia1">Patologia 1:</label>
							<input type="text" class="form-control" name="patologia1">
						</div>
						<div class="col-sm">
							<label for="patologia2">Patologia 2:</label>
							<input type="text" class="form-control" name="patologia2">
						</div>
						<div class="col-sm">
							<label for="patologia3">Patologia 3:</label>
							<input type="text" class="form-control" name="patologia3">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="tratamiento1">Tratamiento 1:</label>
							<input type="text" class="form-control" name="tratamiento1">
						</div>
						<div class="col-sm">
							<label for="tratamiento2">Tratamiento 2:</label>
							<input type="text" class="form-control" name="tratamiento2">
						</div>
						<div class="col-sm">
							<label for="tratamiento3">Tratamiento 3:</label>
							<input type="text" class="form-control" name="tratamiento3">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="cronicidad1">Cronicidad 1:</label>
							<input type="text" class="form-control" name="cronicidad1">
						</div>
						<div class="col-sm">
							<label for="cronicidad2">Cronicidad 2:</label>
							<input type="text" class="form-control" name="cronicidad2">
						</div>
						<div class="col-sm">
							<label for="cronicidad3">Cronicidad 3:</label>
							<input type="text" class="form-control" name="cronicidad3">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="observacion1">Observación 1:</label>
							<input type="text" class="form-control" name="observacion1">
						</div>
						<div class="col-sm">
							<label for="observacion2">Observación 2:</label>
							<input type="text" class="form-control" name="observacion2">
						</div>
						<div class="col-sm">
							<label for="observacion3">Observación 3:</label>
							<input type="text" class="form-control" name="observacion3">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="anamnesis">Anamnesis:</label>
							<input type="text" class="form-control" name="anamnesis" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_uso_od_esfera">Rx uso ojo derecho esfera:</label>
							<input type="text" class="form-control" name="rx_uso_od_esfera">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_cilindro">Rx uso ojo derecho cilindro:</label>
							<input type="text" class="form-control" name="rx_uso_od_cilindro">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_eje">Rx uso ojo derecho eje:</label>
							<input type="text" class="form-control" name="rx_uso_od_eje">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_adicion">Rx uso ojo derecho adicion:</label>
							<input type="text" class="form-control" name="rx_uso_od_adicion">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_uso_oi_esfera">Rx uso ojo izquierdo esfera:</label>
							<input type="text" class="form-control" name="rx_uso_oi_esfera">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_cilindro">Rx uso ojo izquierdo cilindro:</label>
							<input type="text" class="form-control" name="rx_uso_oi_cilindro">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_eje">Rx uso ojo izquierdo eje:</label>
							<input type="text" class="form-control" name="rx_uso_oi_eje">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_adicion">Rx uso ojo izquierdo adicion:</label>
							<input type="text" class="form-control" name="rx_uso_oi_adicion">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="vision_lejos_od">Visión lejos ojo derecho:</label>
							<input type="text" class="form-control" name="vision_lejos_od">
						</div>
						<div class="col-sm">
							<label for="vision_lejos_oi">Visión lejos ojo izquierdo:</label>
							<input type="text" class="form-control" name="vision_lejos_oi">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="vision_cerca_od">Visión cerca ojo derecho:</label>
							<input type="text" class="form-control" name="vision_cerca_od">
						</div>
						<div class="col-sm">
							<label for="vision_cerca_oi">Visión cerca ojo izquierdo:</label>
							<input type="text" class="form-control" name="vision_cerca_oi">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="examen_externo_od">Examen externo ojo derecho:</label>
							<input type="text" class="form-control" name="examen_externo_od" required>
						</div>
						<div class="col-sm">
							<label for=" examen_externo_oi">Examen externo ojo izquierdo:</label>
							<input type="text" class="form-control" name=" examen_externo_oi" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_fotomotor">Reflejos pupilares fotomotor:</label>
							<input type="text" class="form-control" name="reflejos_pupilares_fotomotor" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_consensual">Reflejos pupilares consensual:</label>
							<input type="text" class="form-control" name="reflejos_pupilares_consensual" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_acomodacio">Reflejos pupilares acomodacion:</label>
							<input type="text" class="form-control" name="reflejos_pupilares_acomodacion" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="cover_test_vision_lejos">Cover test visión lejos:</label>
							<input type="text" class="form-control" name="cover_test_vision_lejos">
						</div>
						<div class="col-sm">
							<label for="cover_test_vision_proxima">Cover test visión próxima:</label>
							<input type="text" class="form-control" name="cover_test_vision_proxima">
						</div>
						<div class="col-sm">
							<label for="cover_test_ducciones">Cover test ducciones:</label>
							<input type="text" class="form-control" name="cover_test_ducciones">
						</div>
						<div class="col-sm">
							<label for="cover_test_versiones">Cover test versiones:</label>
							<input type="text" class="form-control" name="cover_test_versiones">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="oi_oftalmoloscopio">Ojo izquierdo oftalmoloscopio:</label>
							<input type="text" class="form-control" name="oi_oftalmoloscopio">
						</div>
						<div class="col-sm">
							<label for="od_oftalmoloscopio">Ojo derecho oftalmoloscopio:</label>
							<input type="text" class="form-control" name="od_oftalmoloscopio">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="oi_queratrometra">Ojo izquierdo queratrometra:</label>
							<input type="text" class="form-control" name="oi_queratrometra">
						</div>
						<div class="col-sm">
							<label for="od_queratrometra">Ojo derecho queratrometra:</label>
							<input type="text" class="form-control" name="od_queratrometra">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="od_retinoscopia">Ojo derecho retinoscopia:</label>
							<input type="text" class="form-control" name="od_retinoscopia">
						</div>
						<div class="col-sm">
							<label for="oi_retinoscopia">Ojo izquierdo retinoscopia:</label>
							<input type="text" class="form-control" name="oi_retinoscopia">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_final_od_esfera">Rx final ojo derecho esfera:</label>
							<input type="text" class="form-control" name="rx_final_od_esfera" required>
						</div>
						<div class="col-sm">
							<label for="rx_final_od_cilindro">Rx final ojo derecho cilindro:</label>
							<input type="text" class="form-control" name="rx_final_od_cilindro" required>
						</div>
						<div class="col-sm">
							<label for="rx_final_od_eje">Rx final ojo derecho eje:</label>
							<input type="text" class="form-control" name="rx_final_od_eje" required>
						</div>
						<div class="col-sm">
							<label for="rx_final_od_adicion">Rx final ojo derecho adicion:</label>
							<input type="text" class="form-control" name="rx_final_od_adicion" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_final_oi_esfera">Rx final ojo izquierdo esfera:</label>
							<input type="text" class="form-control" name="rx_final_oi_esfera" required>
						</div>
						<div class="col-sm">
							<label for="rx_final_oi_cilindro">Rx final ojo izquierdo cilindro:</label>
							<input type="text" class="form-control" name="rx_final_oi_cilindro" required>
						</div>
						<div class="col-sm">
							<label for="rx_final_oi_eje">Rx final ojo izquierdo eje:</label>
							<input type="text" class="form-control" name="rx_final_oi_eje" required> 
						</div>
						<div class="col-sm">
							<label for="rx_final_oi_adicion">Rx final ojo izquierdo adicion:</label>
							<input type="text" class="form-control" name="rx_final_oi_adicion" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_final_od_agudes_visual">Rx final ojo derecho agudes visual:</label>
							<input type="text" class="form-control" name="rx_final_od_agudes_visual" required>
						</div>
						<div class="col-sm">
							<label for="rx_final_oi_agudes_visual">Rx final ojo izquierdo agudes visual:</label>
							<input type="text" class="form-control" name="rx_final_oi_agudes_visual" required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="diagnostico">Diagnóstico:</label>
							<input type="text" class="form-control" name="diagnostico">
						</div>
						<div class="col-sm">
							<label for="control">Control:</label>
							<input type="date" class="form-control" name="control">
						</div>
						<div class="col-sm">
							<label for="observacion">Observación:</label>
							<input type="text" class="form-control" name="observacion">
						</div>
					</div>
					<br>
					<div class="d-flex justify-content-end">
						<input type="submit" class="btn btn-primary" value="Guardar">
					</div>
				</form>
				<div class="d-flex justify-content-center">
                    <button class="btn btn-primary"> <a href="../../historiaClinica.php">Volver</a></button>
                </div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer id="footer">
		<div class="container">

			<div class="row space40"></div>
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
	<script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/functions.js"></script>
	<script type="text/javascript" defer src="../../js/jquery.flexslider.js"></script>
</body>

</html>