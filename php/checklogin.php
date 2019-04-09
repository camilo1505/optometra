<?php
	include("BDServices.php");
	session_start();
?>
<?php
	$username = $_POST['usuario'];
	$password = $_POST['contrasena'];

	/*busqueda de usuario en la base de datos*/
	$sql = "SELECT * FROM usuario WHERE cedula = '$username'";
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
			$_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
			redirect("panel-control.php");
		}else { 
			redirect("../login.html");
		}

	}
?>