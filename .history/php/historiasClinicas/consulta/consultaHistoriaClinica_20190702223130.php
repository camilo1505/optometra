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
    $id_historia_clinica = $_POST['id_historia_clinica'];
    
    $sql = "SELECT * FROM historia_clinica WHERE id_historia_clinica = '$id_historia_clinica'";
		$resultado = getData($sql,'jp', '1234');
		$id_cliente = $resultado[0]['fk_cliente'];
		$sql = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente'";
		$datosClientes = getData($sql,'jp', '1234');

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
				<h1>Consulta Historia Clínica de: <b style="color:red;"> <?php print($datosClientes[0]['apellidos'] ." " . $datosClientes[0]['nombres']); ?></b>.</h1>
				<br>
				<form action="registrar.php" method="post">
					<div class="row">
						<div class="col-sm">
							<label for="fk_cliente">Cédula Cliente:</label>
							<?php echo $datosClientes[0]["cedula"]?>
						</div>
						<div class="col-sm">
							<label for="fk_usuario">Cédula Optómetra: </label>
							<input type="text" class="form-control" name="fk_usuario" value="<?php echo $_SESSION['cedula']?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="patologia1">Patología 1:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['patologia1'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="patologia2">Patología 2:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['patologia2'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="patologia3">Patología 3:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['patologia3'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="tratamiento1">Tratamiento 1:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['tratamiento1'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="tratamiento2">Tratamiento 2:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['tratamiento2'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="tratamiento3">Tratamiento 3:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['tratamiento3'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="cronicidad1">Cronicidad 1:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['cronicidad1'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="cronicidad2">Cronicidad 2:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['cronicidad2'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="cronicidad3">Cronicidad 3:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['cronicidad3'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="observacion1">Observación 1:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['observacion1'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="observacion2">Observación 2:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['observacion2'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="observacion3">Observación 3:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['observacion3'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="anamnesis">Anamnesis:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['anamnesis'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_uso_od_esfera">Rx uso ojo derecho esfera:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_uso_od_esfera'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_cilindro">Rx uso ojo derecho cilindro:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_uso_od_cilindro'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_eje">Rx uso ojo derecho eje:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_uso_od_eje'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_adicion">Rx uso ojo derecho adicion:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_uso_od_adicion'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_uso_oi_esfera">Rx uso ojo izquierdo esfera:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_uso_oi_esfera'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_cilindro">Rx uso ojo izquierdo cilindro:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_uso_oi_cilindro'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_eje">Rx uso ojo izquierdo eje:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_uso_oi_eje'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_adicion">Rx uso ojo izquierdo adicion:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_uso_oi_adicion'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="vision_lejos_od">Visión lejos ojo derecho:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['vision_lejos_od'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="vision_lejos_oi">Visión lejos ojo izquierdo:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['vision_lejos_oi'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="vision_cerca_od">Visión cerca ojo derecho:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['vision_cerca_od'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="vision_cerca_oi">Visión cerca ojo izquierdo:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['vision_cerca_oi'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="examen_externo_od">Examen externo ojo derecho:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['examen_externo_od'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for=" examen_externo_oi">Examen externo ojo izquierdo:</label>
							<input type="text" class="form-control" value=" <?php echo $resultado[0]['examen_externo_oi'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_fotomotor">Reflejos pupilares fotomotor:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['reflejos_pupilares_fotomotor'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_consensual">Reflejos pupilares consensual:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['reflejos_pupilares_consensual'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_acomodacio">Reflejos pupilares acomodación:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['reflejos_pupilares_acomodacion'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="cover_test_vision_lejos">Cover test visión lejos:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['cover_test_vision_lejos'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="cover_test_vision_proxima">Cover test vision próxima:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['cover_test_vision_proxima'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="cover_test_ducciones">Cover test ducciones:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['cover_test_ducciones'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="cover_test_versiones">Cover test versiones:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['cover_test_versiones'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="oi_oftalmoloscopio">Ojo izquierdo oftalmoloscopio:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['oi_oftalmoloscopio'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="od_oftalmoloscopio">Ojo derecho oftalmoloscopio:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['od_oftalmoloscopio'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="oi_queratrometra">Ojo izquierdo queratrometra:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['oi_queratrometra'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="od_queratrometra">Ojo derecho queratrometra:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['od_queratrometra'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="od_retinoscopia">Ojo derecho retinoscopia:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['od_retinoscopia'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="oi_retinoscopia">Ojo izquierdo retinoscopia:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['oi_retinoscopia'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_final_od_esfera">Rx final ojo derecho esfera:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_od_esfera'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_final_od_cilindro">Rx final ojo derecho cilindro:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_od_cilindro'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_final_od_eje">Rx final ojo derecho eje:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_od_eje'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_final_od_adicion">Rx final ojo derecho adicion:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_od_adicion'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_final_oi_esfera">Rx final ojo izquierdo esfera:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_oi_esfera'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_final_oi_cilindro">Rx final ojo izquierdo cilindro:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_oi_cilindro'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_final_oi_eje">Rx final ojo izquierdo eje:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_oi_eje'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_final_oi_adicion">Rx final ojo izquierdo adicion:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_oi_adicion'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_final_od_agudes_visual">Rx final ojo derecho agudes visual:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_od_agudes_visual'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="rx_final_oi_agudes_visual">Rx final ojo izquierdo agudes visual:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['rx_final_oi_agudes_visual'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="diagnostico">Diagnóstico:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['diagnostico'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="control">control:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['control'] ?>" readonly="readonly">
						</div>
						<div class="col-sm">
							<label for="observacion">Observación:</label>
							<input type="text" class="form-control" value="<?php echo $resultado[0]['observacion'] ?>" readonly="readonly">
						</div>
					</div>
					<br>
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