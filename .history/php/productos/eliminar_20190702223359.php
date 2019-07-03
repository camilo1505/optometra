<?php
	include("../BDServices.php");
	session_start();
    $cedula = $_POST['ID_producto'];
    $sql = "SELECT * FROM producto WHERE id_producto = '$cedula'";
    $result = getData($sql,'jp', '1234');

    if($result[0]['activado']=='0'){
        $sql = "UPDATE producto SET activado = '1' WHERE id_producto = '$cedula'";
    } else{
        $sql = "UPDATE producto SET activado = '0' WHERE id_producto = '$cedula'";
    }
    
    $result = setData($sql,'jp', '1234');

    if($result){
        echo "
        <script>
            alert('Cambio efectuado Correctamente');
            window.location.href='eliminarProducto.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error en el Cambio');
            window.location.href='eliminarProducto.php';
        </script>
    ";
    }
