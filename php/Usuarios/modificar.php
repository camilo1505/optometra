<?php
	include("../BDServices.php");
	session_start();

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $rol = $_POST['rol'];
    $sql = "UPDATE usuario SET cedula='$cedula', nombres ='$nombre',apellidos = '$apellido'";
    $result = setData($sql,'root','');
    $sql = "SELECT * FROM usuario WHERE cedula = '$cedula'";
    $result = getData($sql,'root','');
    $id_usuario = $result[0]['id_usuario'];
    $sql = "UPDATE rol SET (fk_usuario='$id_usuario',fk_rol='$rol'";
    $result = setData($sql,'root','');
    redirect("editarUsuario.php");
?>