<?php
	include("../BDServices.php");
	session_start();
    $id = $_POST['id_usuario'];
    $sql = "UPDATE usuario
            SET usuario.desactivado = 1
            WHERE usuario.id_usuario = '$id'";
    $result = setData($sql,'root','');
    
    if($result){
        echo "
        <script>
            alert('Eliminado Correctamente');
            window.location.href='eliminarUsuario.php';
        </script>
        ";
    }
    else {
        echo "
        <script>
            alert('Error Eliminando el Usuario');
            window.location.href='eliminarUsuario.php';
        </script>
    ";
    }
?>

