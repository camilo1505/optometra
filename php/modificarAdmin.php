<?php

	$host_db = "localhost";
	$user_db = "jp";
	$pass_db = "1234";
	$db_name = "optometria";
	$tbl_name = "usuario";
	 
	 
	$hash = password_hash("admin", PASSWORD_BCRYPT); 

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	if ($conexion->connect_error) {
		die("La conexion falló: " . $conexion->connect_error);
	}
	
	$crearUsuario = "UPDATE usuario
                     SET cedula = 'admin', nombres = 'Administrador', apellidos = 'Administrador', usuario_password = '$hash'
                     WHERE id_usuario = 1";
	
	echo($crearUsuario);

	if ($conexion->query($crearUsuario) === TRUE)
	{
		echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";	
	}
	else {
		echo "Error al crear el usuario.";
	}
	
	mysqli_close($conexion);
?>