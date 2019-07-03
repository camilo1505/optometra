<?php
	include("../BDServices.php");
	session_start();

    $cedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $fecha = $_POST['fecha'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $correo = $_POST['email'];
    $disponible = $_POST['disponible'];
    $gafas = $_POST['gafas'];

    if($disponible == 'si'){
        $disponible = True;
    }
    else {
        $disponible = False;
    }

    if($gafas == 'si'){
        $gafas = True;
    } else {
        $gafas = False;
    }

    $sql = "INSERT INTO cliente (cedula, nombres, apellidos, nacimiento, ciudad, direccion, telefono, celular, correo, disponibilidad_llamadas, usa_gafas)
            VALUES ('$cedula','$nombres','$apellidos','$fecha','$ciudad','$direccion','$telefono','$celular','$correo','$disponible','$gafas')";
    $result = setData($sql,'jp', '1234');

    if($result){
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='crearCliente.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Error Guardando al Cliente');
            window.location.href='crearCliente.php';
        </script>
    ";
    }
?>












                
                
                
                
                
                
                
                
                
                
                
            