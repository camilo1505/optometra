<?php

function conectarBDAdministrador() {
    $servername = "localhost";
    $username = "admin";
    $password = "admin";

    //Creando la conexion
    $conexion = new mysqli($servername, $username, $password);

    //comprbando conexion
    if($conexion) {
        echo "La conexion a la base de datos se ha hecho satisfactoriamente";
    } else {
        echo "Ha sucedido un error inesperado en la conexion con la base de datos";
    }
    return $conexion;
}

function desconectarBD($conexion){
    $close = mysqli_close($conexion);
    if($close){
        echo "La conexion se ha cerrado satisfactoriamente";
    } else {
        echo "Ha sucedido un error inesperado cerrando la conexion";
    }
    return $close;
}
?>