<?php

function conectarBDAdministrador() {
    $servername = "localhost";
    $username = "admin";
    $password = "admin";

    //Creando la conexion
    $conexion = new mysqli($servername, $username, $password);

    //comprbando conexion
    if($conexion -> connect_error) {
        die("Conexion Fallida: ".$conexion -> connect_error);
    }
    echo "Conexion Exitosa";
    return $conexion;
}
?>