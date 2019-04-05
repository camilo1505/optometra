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
    $sql = "INSERT INTO cliente (cedula, primer_nombre,segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, ciudad_vivienda, direccion_vivienda, telefono, celular, correo, ocupacion, empresa_laboral, telefono_empresa, disponibilidad_llamadas, usa_gafas) VALUES ('$cedula','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$fecha_nacimiento','$ciudad_vivienda','$direccion_vivienda','$telefono','$celular','$correo','$ocupacion','$empresa_laboral','$telefono_empresa','$disponibilidad_llamadas','$usa_gafas')";
    $result = setData($sql,'root','');
    redirect("crearCliente.php");
?>












                
                
                
                
                
                
                
                
                
                
                
            