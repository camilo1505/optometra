<?php
	include("../BDServices.php");
	session_start();

    $cedula = $_POST['cedula'];
    $primer_nombre = $_POST['primerNombre'];
    $segundo_nombre = $_POST['segundoNombre'];
    $primer_apellido = $_POST['primerApellido'];
    $segundo_apellido = $_POST['segundoApellido'];
    $fecha_nacimiento = $_POST['edad'];
    $ciudad_vivienda = $_POST['ciudad'];
    $direccion_vivienda = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['email'];
    $ocupacion = "sin detalles";
    $empresa_laboral = $_POST['telefono'];
    $telefono_empresa = "sin detalles";
    $disponibilidad_llamadas = $_POST['disponibleLlamadas'];
    $usa_gafas = $_POST['usaGafas'];
    $sql = "UPDATE cliente SET primer_nombre ='$primer_nombre',segundo_nombre = '$segundo_nombre', primer_apellido = '$primer_apellido', segundo_apellido = '$segundo_apellido', fecha_nacimiento = '$fecha_nacimiento', ciudad_vivienda = '$ciudad_vivienda', direccion_vivienda = '$direccion_vivienda', telefono = '$telefono', celular = '$celular', correo = '$correo', ocupacion = '$ocupacion', empresa_laboral = '$empresa_laboral', telefono_empresa = '$telefono_empresa', disponibilidad_llamadas = '$disponibilidad_llamadas', usa_gafas = '$usa_gafas' WHERE cedula = '$cedula'";
    $result = setData($sql,'root','');
    redirect("editarCliente.php");
?>


