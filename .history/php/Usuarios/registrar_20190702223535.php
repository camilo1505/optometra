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
    $result = setData($sql,'jp', '1234');
    $sql = "SELECT * FROM usuario WHERE cedula = '$cedula'";
    $result = getData($sql,'jp', '1234');
    $id_usuario = $result[0]['id_usuario'];
    $sql = "INSERT INTO roles (fk_usuario,fk_rol) VALUES ('$id_usuario','$rol')";
    if($result = setData($sql,'jp', '1234')){
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='../panel-control.php';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Ha Ocurrido un Error Guardando al Usuario');
                window.location.href='crearUsuario.php';
            </script>
        ";
    }
?>












                
                
                
                
                
                
                
                
                
                
                
            