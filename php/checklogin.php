<?php
	include("BDServices.php");
	session_start();
?>
<?php

	$username = $_POST['usuario'];
	$password = $_POST['contrasena'];

	/*busqueda de usuario en la base de datos*/
	$sql = "SELECT * FROM usuario WHERE cedula = '$username'";
	$result = getData($sql,'root','') ;
	echo $result;
	echo $result[0];
	if(count($result[0]) > 0){
		/*busqueda de tipo de rol*/
		$idUsuario= $result[2];
		echo $idUsuario;
		$sql = "SELECT * FROM roles WHERE fk_usuario = '$idUsuario'";
		$result = $conexion->query($sql);
		$row1 = $result->fetch_array(MYSQLI_ASSOC);
		$tipoUsuario= $row1["fk_rol"];
		if(password_verify($password, $usuario['usuario_password'])){ 
			$_SESSION['fk_rol'] = $tipoUsuario;
			$_SESSION['loggedin'] = true;
			$_SESSION['cedula'] = $username;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

			redirect("panel-control.php");

		}else { 
	    
			echo "<script>alert('El usuario no existe');</script>";
			
		}

	}
?>