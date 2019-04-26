<?php
	include("BDServices.php");
	session_start();
	$username = $_POST['usuario'];
	$password = $_POST['contrasena'];

	/*busqueda de usuario en la base de datos*/
	$sql = "SELECT * FROM usuario WHERE cedula = '$username' and activado = '0'";
	$result = getData($sql,'root','');
	if(count($result)>0){
		/*busqueda de tipo de rol*/
		$idUsuario= $result[0]["id_usuario"];
		$sql = "SELECT * FROM roles WHERE fk_usuario = '$idUsuario'";
		$tipoUsuario = getData($sql,'root','');
		if(password_verify($password, $result[0]["usuario_password"])){ 
			
			$_SESSION['rol'] = $tipoUsuario[0]['fk_rol'];
			$_SESSION['loggedin'] = true;
			$_SESSION['cedula'] = $username;
			$_SESSION['usuario'] = $result[0]['nombres'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
			redirect("panel-control.php");
		}
	}
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { } else {
		echo "<script>
				  alert('Error: Los Datos de Login son Incorrectos');
				  window.location.href='../login.html';
			  </script>";
		exit;
	}
	
	$now = time();

	if ($now > $_SESSION['expire']) {
	session_destroy();

	echo "  <script>
				alert('La Sesion ha expirado');
				window.location.href='../login.html';
			</script>";
	exit;
	}
?>