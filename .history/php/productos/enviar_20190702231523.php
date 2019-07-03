<?php
    include("../BDservices.php");
    $producto = $_POST["nombre_producto"];
    echo "hola".$producto;
    $username = "jp";
    $password = "1234";
    $consulta = "INSERT INTO producto(nombre_producto) VALUES('$producto')";
    echo $consulta;
    
?>