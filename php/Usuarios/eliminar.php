<?php
	include("../BDServices.php");
	session_start();
    $cedula = $_POST['cedula'];
    $sql = "DELETE FROM usuario WHERE cedula = '$cedula'";
    echo $sql;
    $result = setData($sql,'root','');
    
    redirect("eliminarUsuario.php");
?>

