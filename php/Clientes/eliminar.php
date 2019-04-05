<?php
	include("../BDServices.php");
	session_start();
    $cedula = $_POST['cedula'];
    $sql = "DELETE FROM cliente WHERE cedula = '$cedula'";
    echo $sql;
    $result = setData($sql,'root','');
    
    redirect("eliminarCliente.php");
?>












                
                
                
                
                
                
                
                
                
                
                
            