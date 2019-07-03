<?php
	include("../BDServices.php");
	session_start();

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $password = $_POST['password'];

    $hash = password_hash($password, PASSWORD_BCRYPT); 

    $sql = "UPDATE usuario SET nombres ='$nombre',apellidos = '$apellido', usuario_password = '$hash' WHERE cedula = '$cedula'";
    $result = setData($sql,'root','');
    if($result) {
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='editarUsuario.php';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('Error Almacenando los Cambios');
                window.location.href='editarUsuario.php';
            </script>
        ";
    }
?>