<?php

function conectarBD($user, $password) {
    $server = "localhost";
    $bd = "optometria";

    //Creando la conexion
    $conexion = mysqli_connect($server, $user, $password, $bd);

    //comprbando conexion
    if($conexion) {
        //echo "La conexion a la base de datos se ha hecho satisfactoriamente";
    } else {
        echo "Ha sucedido un error inesperado en la conexion con la base de datos";
    }
    return $conexion;
}

function desconectarBD($conexion){
    $close = mysqli_close($conexion);
    if($close){
        //echo "La conexion se ha cerrado satisfactoriamente";
    } else {
        echo "Ha sucedido un error inesperado cerrando la conexion";
    }
    return $close;
}

function getData($sql, $username, $password) {

    $conexion = conectarBD($username, $password);

    mysqli_set_charset($conexion, "utf8");

    if(!$result = mysqli_query($conexion, $sql)) {
        echo $result;
        die();
    }

    $rawdata = array();

    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        $rawdata[$i] = $row;
        $i++;
    }
    desconectarBD($conexion);
    $jsonResponse = json_encode($rawdata);
    return $jsonResponse;
}

?>