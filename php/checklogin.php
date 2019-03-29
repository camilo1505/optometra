<?php
	session_start();
?>
<?php
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "optometria";
	$tbl_name = "usuario";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}

	$username = $_POST['usuario'];
	$password = $_POST['contrasena'];

	/*busqueda de usuario en la base de datos*/
	$sql = "SELECT * FROM $tbl_name WHERE cedula = '$username'";
	$result = $conexion->query($sql);
	$usuario = $result->fetch_array(MYSQLI_ASSOC);
	if($result->num_rows > 0){
		/*busqueda de tipo de rol*/
		$idUsuario= $usuario["id_usuario"];
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