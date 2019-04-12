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
	<title>Opticas Henao</title>
	<link href="../../../css/styles.css" rel="stylesheet" />
	<link href="../../../css/bootstrap-override.css" rel="stylesheet" />
	<link href="../../../css/font-awesome/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="../../../css/flexslider.css" type="../../../text/css" media="../../../screen" />
</head>
<?php
$cliente = $_POST['fk_cliente'];
$sql = "SELECT * FROM cliente WHERE id_cliente = '$cliente'";
$datosClientes = getData($sql, 'root', '');
$sql ="SELECT *
			 FROM usuario, roles, rol
       WHERE roles.fk_usuario = 2
       AND roles.fk_usuario = usuario.id_usuario
			 AND roles.fk_rol = rol.id_rol";
$datosMedico = getData($sql, 'root', '');
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
						<a class="navbar-brand" href="../../../index.html">Opticas Henao</a>
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
									<a class="nav-link" href="../../../contactanos.html">Contactenos<span class="sr-only">(current)</span></a>
								</li>
								<li>
									<a class="nav-link" href="../../panel-control.php">Panel de Control<span class="sr-only">(current)</span></a>
								</li>
								<li>
									<a class="nav-link" href="../../../login.html">Iniciar Sesion<span class="sr-only">(current)</span></a>
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
				<h1>Crear Historia Clinica de <?php print($datosClientes[0]['nombres'] . " " . $datosClientes[0]['apellidos']); ?>.</h1>
				<br>
				<form action="registrar.php" method="post">
					<div class="row">
						<div class="col-sm">
							<label for="cedulaCliente">Cedula Cliente:</label>
							<input type="text" class="form-control" name="cedulaCliente" value="<?php print($datosClientes[0]["cedula"]); ?>" readonly>
						</div>
						<div class="col-sm">
							<label for="cedulaMedico">Cedula Optometra: </label>
							<input type="text" class="form-control" name="cedulaMedico" value="<?php print($datosMedico[0]["cedula"]); ?>" readonly>
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
							<label for="observacion1">Observacion 1:</label>
							<input type="text" class="form-control" name="observacion1">
						</div>
						<div class="col-sm">
							<label for="observacion2">Observacion 2:</label>
							<input type="text" class="form-control" name="observacion2">
						</div>
						<div class="col-sm">
							<label for="observacion3">Observacion 3:</label>
							<input type="text" class="form-control" name="observacion3">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="anamnesis">Anamnesis:</label>
							<input type="text" class="form-control" name="anamnesis">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_uso_od_esfera">rx uso ojo derecho esfera:</label>
							<input type="text" class="form-control" name="rx_uso_od_esfera">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_cilindro">rx uso ojo derecho cilindro:</label>
							<input type="text" class="form-control" name="rx_uso_od_cilindro">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_eje">rx uso ojo derecho eje:</label>
							<input type="text" class="form-control" name="rx_uso_od_eje">
						</div>
						<div class="col-sm">
							<label for="rx_uso_od_adicion">rx uso ojo derecho adicion:</label>
							<input type="text" class="form-control" name="rx_uso_od_adicion">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="rx_uso_oi_esfera">rx uso ojo izquierdo esfera:</label>
							<input type="text" class="form-control" name="rx_uso_oi_esfera">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_cilindro">rx uso ojo izquierdo cilindro:</label>
							<input type="text" class="form-control" name="rx_uso_oi_cilindro">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_eje">rx uso ojo izquierdo eje:</label>
							<input type="text" class="form-control" name="rx_uso_oi_eje">
						</div>
						<div class="col-sm">
							<label for="rx_uso_oi_adicion">rx uso ojo izquierdo adicion:</label>
							<input type="text" class="form-control" name="rx_uso_oi_adicion">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="vision_lejos_od">vision lejos ojo derecho:</label>
							<input type="text" class="form-control" name="vision_lejos_od">
						</div>
						<div class="col-sm">
							<label for="vision_lejos_oi">vision lejos ojo izquierdo:</label>
							<input type="text" class="form-control" name="vision_lejos_oi">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="vision_cerca_od">vision cerca ojo derecho:</label>
							<input type="text" class="form-control" name="vision_cerca_od">
						</div>
						<div class="col-sm">
							<label for="vision_cerca_oi">vision cerca ojo izquierdo:</label>
							<input type="text" class="form-control" name="vision_cerca_oi">
						</div>
						</div>
						<br>
						<div class="row">
						<div class="col-sm">
							<label for="examen_externo_od">examen externo ojo derecho:</label>
							<input type="text" class="form-control" name="vision_cerca_od">
						</div>
						<div class="col-sm">
							<label for="examen_externo_oi">examen externo ojo izquierdo:</label>
							<input type="text" class="form-control" name="vision_cerca_oi">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_fotomotor">reflejos pupilares fotomotor:</label>
							<input type="text" class="form-control" name="reflejos_pupilares_fotomotor">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_consensual">reflejos pupilares consensual:</label>
							<input type="text" class="form-control" name="reflejos_pupilares_consensual">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm">
							<label for="reflejos_pupilares_acomodacio">reflejos pupilares acomodacion:</label>
							<input type="text" class="form-control" name="reflejos_pupilares_acomodacion">
						</div>
					</div>
				</form>
				<form action="registrar.php" method="post">
					<table class="table" border="1">
						<thead>
							<th>Cliente</th>
							<th>Medico</th>
							<th>patologia1</th>
							<th>patologia2</th>
							<th>patologia3</th>
							<th>tratamiento1</th>
							<th>tratamiento2</th>
							<th>tratamiento3</th>
							<th>cronicidad1</th>
							<th>cronicidad2</th>
							<th>cronicidad3</th>
							<th>observacion1</th>
							<th>observacion2</th>
							<th>observacion3</th>
							<th>anamnesis</th>
							<th>rx uso ojo derecho esfera</th>
							<th>rx uso ojo derecho cilindro</th>
							<th>rx uso ojo derecho eje</th>
							<th>rx uso ojo derecho adicion</th>
							<th>rx uso ojo izquierdo esfera</th>
							<th>rx uso ojo izquierdo cilindro</th>
							<th>rx uso ojo izquierdo eje</th>
							<th>rx uso ojo izquierdo adicion</th>
							<th>vision lejos ojo derecho</th>
							<th>vision lejos ojo izquierdo</th>
							<th>vision cerca ojo derecho</th>
							<th>vision cerca ojo izquierdo</th>
							<th>examen externo ojo derecho</th>
							<th>examen externo ojo izquierdo</th>
							<th>reflejos pupilares fotomotor</th>
							<th>reflejos pupilares consensual</th>
							<th>reflejos pupilares acomodacion</th>
							<th>cover test vision lejos</th>
							<th>cover test vision proxima</th>
							<th>cover test ducciones</th>
							<th>cover test versiones</th>
							<th>ojo derecho oftalmoloscopio</th>
							<th>ojo izquierdo oftalmoloscopio</th>
							<th>ojo derecho queratrometra</th>
							<th>ojo izquierdo queratrometra</th>
							<th>ojo derecho retinoscopia</th>
							<th>ojo izquierdo retinoscopia</th>
							<th>rx final ojo derecho esfera</th>
							<th>rx final ojo derecho cilindro</th>
							<th>rx final ojo derecho eje</th>
							<th>rx final ojo derecho adicion</th>
							<th>rx final ojo izquierdo esfera</th>
							<th>rx final ojo izquierdo cilindro</th>
							<th>rx final ojo izquierdo eje</th>
							<th>rx final ojo izquierdo adicion</th>
							<th>rx final ojo derecho agudes visual</th>
							<th>rx final ojo izquierdo agudes visual</th>
							<th>diagnostico</th>
							<th>control</th>
							<th>observacion</th>
						</thead>
						<tbody>
							<tr>
								<td><input name="fk_cliente" value="<?php echo $cliente; ?>" placeholder="<?php echo $cliente; ?>" readonly="readonly"></td>
								<td><input name="fk_usuario" value="<?php echo $_SESSION['cedula']; ?>" placeholder="<?php echo $_SESSION['cedula']; ?>" readonly="readonly"></td>
								<td><input name="patologia1" type="text" /></td>
								<td><input name="patologia2" type="text" /></td>
								<td><input name="patologia3" type="text" /></td>
								<td><input name="tratamiento1" type="text" /></td>
								<td><input name="tratamiento2" type="text" /></td>
								<td><input name="tratamiento3" type="text" /></td>
								<td><input name="cronicidad1" type="text" /></td>
								<td><input name="cronicidad2" type="text" /></td>
								<td><input name="cronicidad3" type="text" /></td>
								<td><input name="observacion1" type="text" /></td>
								<td><input name="observacion2" type="text" /></td>
								<td><input name="observacion3" type="text" /></td>
								<td><input name="anamnesis" type="text" /></td>
								<td><input name="rx_uso_od_esfera" type="text" /></td>
								<td><input name="rx_uso_od_cilindro" type="text" /></td>
								<td><input name="rx_uso_od_eje" type="text" /></td>
								<td><input name="rx_uso_od_adicion" type="text" /></td>
								<td><input name="rx_uso_oi_esfera" type="text" /></td>
								<td><input name="rx_uso_oi_cilindro" type="text" /></td>
								<td><input name="rx_uso_oi_eje" type="text" /></td>
								<td><input name="rx_uso_oi_adicion" type="text" /></td>
								<td><input name="vision_lejos_od" type="text" /></td>
								<td><input name="vision_lejos_oi" type="text" /></td>
								<td><input name="vision_cerca_od" type="text" /></td>
								<td><input name="vision_cerca_oi" type="text" /></td>
								<td><input name="examen_externo_od" type="text" /></td>
								<td><input name="examen_externo_oi" type="text" /></td>
								<td><input name="reflejos_pupilares_fotomotor" type="text" /></td>
								<td><input name="reflejos_pupilares_consensual" type="text" /></td>
								<td><input name="reflejos_pupilares_acomodacion" type="text" /></td>
								<td><input name="cover_test_vision_lejos" type="text" /></td>
								<td><input name="cover_test_vision_proxima" type="text" /></td>
								<td><input name="cover_test_ducciones" type="text" /></td>
								<td><input name="cover_test_versiones" type="text" /></td>
								<td><input name="od_oftalmoloscopio" type="text" /></td>
								<td><input name="oi_oftalmoloscopio" type="text" /></td>
								<td><input name="od_queratrometra" type="text" /></td>
								<td><input name="oi_queratrometra" type="text" /></td>
								<td><input name="od_retinoscopia" type="text" /></td>
								<td><input name="oi_retinoscopia" type="text" /></td>
								<td><input name="rx_final_od_esfera" type="text" /></td>
								<td><input name="rx_final_od_cilindro" type="text" /></td>
								<td><input name="rx_final_od_eje" type="text" /></td>
								<td><input name="rx_final_od_adicion" type="text" /></td>
								<td><input name="rx_final_oi_esfera" type="text" /></td>
								<td><input name="rx_final_oi_cilindro" type="text" /></td>
								<td><input name="rx_final_oi_eje" type="text" /></td>
								<td><input name="rx_final_oi_adicion" type="text" /></td>
								<td><input name="rx_final_od_agudes_visual" type="text" /></td>
								<td><input name="rx_final_oi_agudes_visual" type="text" /></td>
								<td><input name="diagnostico" type="text" /></td>
								<td><input name="control" type="text" /></td>
								<td><input name="observacion" type="text" /></td>
							</tr>
						</tbody>
					</table>
					<button class="site-btn">Guardar</button>
				</form>
			</div>
		</div>
	</div>
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