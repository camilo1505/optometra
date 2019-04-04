<?php
    include("php/BDconection.php");
    $username = "root";
    $password = "";
    $consulta = "SELECT producto.nombre_producto FROM producto";

    $respuesta = getData($consulta, $username, $password);

    print($respuesta[0]["nombre_producto"]);

    print_r ($respuesta);
?>