<?php
	include("../BDServices.php");
	session_start();

    $cedula = $_POST['cedula'];
    $nombre = $_POST['Nombres'];
    $apellido = $_POST['Apellidos'];
    $contrasena = $_POST['contraseña'];
    $hash = password_hash($contrasena, PASSWORD_BCRYPT); 

    $rol = $_POST['rol'];
    $sql = "INSERT INTO usuario (cedula, nombres,apellidos, usuario_password) VALUES ('$cedula','$nombre','$apellido','$hash')";
    $result = setData($sql,'root','');
    $sql = "SELECT * FROM usuario WHERE cedula = '$cedula'";
    $result = getData($sql,'root','');
    $id_usuario = $result[0]['id_usuario'];
    $sql = "INSERT INTO roles (fk_usuario,fk_rol) VALUES ('$id_usuario','$rol')";
    $result = setData($sql,'root','');
    redirect("crearUsuario.php");
?>












                
                
                
                
                
                
                
                
                
                
                
            