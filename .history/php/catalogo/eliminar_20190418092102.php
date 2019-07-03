<?php
	include("../BDServices.php");
	session_start();
    $cedula = $_POST['id_catalogo'];
    $sql = "DELETE FROM catalogo WHERE id_catalogo = '$cedula'";
    $result = setData($sql,'root','');
    
    if($result){
        echo "
        <script>
            alert('Eliminado Correctamente');
            window.location.href='eliminarCatalogo.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error Eliminando el Usuario');
            window.location.href='eliminarCatalogo.php';
        </script>
    ";
    }
