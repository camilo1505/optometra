<?php
	include("../BDServices.php");
	session_start();

    $id = $_POST['id'];
    $cedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $fecha = $_POST['fecha'];
    $ciudad_vivienda = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['email'];
   
    $sql = "UPDATE cliente 
            SET cedula='$cedula', nombres ='$nombres', apellidos = '$apellidos', nacimiento = '$fecha', ciudad = '$ciudad_vivienda', direccion = '$direccion', telefono = '$telefono', celular = '$celular', correo = '$correo'
            WHERE id_cliente = '$id'";
    $result = setData($sql,'jp', '1234');
    redirect("../clientes.php");
?>


