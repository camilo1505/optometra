<?php
	session_start();
?>
<?php
	include("BDconection.php");

	$username = $_POST['usuario'];
	$password = $_POST['contrasena'];

	/*busqueda de usuario en la base de datos*/
	$sql = "SELECT * FROM usuario WHERE cedula = '$username'";
	$conexion = conectarBDAdministrador('root','');
	$result = getData($sql, $conexion);
	echo "hola señor usuario".$result.id_usuario;
	if(count($result) > 0){
		/*busqueda de tipo de rol*/
		$idUsuario= $result.id_usuario;
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

			
			echo "Bienvenido! " . $_SESSION['cedula'];
		}else { 
	    
			echo "<script>alert('El usuario no existe');</script>";
		}
	}
	mysqli_close($conexion); 
	

	function redirect($url, $statusCode = 303)
	{
	   header('Location: ' . $url, true, $statusCode);
	   die();
	   
	}

?>