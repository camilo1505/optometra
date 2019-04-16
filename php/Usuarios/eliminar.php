<?php
	include("../BDServices.php");
	session_start();
    $id = $_POST['id_usuario'];
    $sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
    $result = getData($sql,'root','');

    if($result[0]['activado']=='0'){
        $sql = "UPDATE usuario SET activado = '1' WHERE id_usuario = '$id'";
    } else{
        $sql = "UPDATE usuario SET activado = '0' WHERE id_usuario = '$id'";
    }

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

