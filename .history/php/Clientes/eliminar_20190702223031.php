<?php
	include("../BDServices.php");
	session_start();
    $cedula = $_POST['id_cliente'];
    $sql = "DELETE FROM cliente WHERE id_cliente = '$cedula'";
    echo $sql;
    $result = setData($sql,'jp', '1234');
    
    if($result){
        echo "
        <script>
            alert('Eliminado Correctamente');
            window.location.href='eliminarCliente.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error Eliminando el Usuario');
            window.location.href='eliminarCliente.php';
        </script>
    ";
    }
