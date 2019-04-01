<?php

function conectarBDAdministrador($username, $password) {
    $serverName = "localhost";

    //Creando la conexion
    $conexion = new mysqli($serverName, $username, $password);

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

function getData($sql,$conexion) {

    mysqli_set_charset($conexion, "utf8");

    if(!$result = mysqli_query($conexion, $sql)) die();

    $rawdata = array();

    $i=0;
    while($row = mysqli_fetch_array($result)) {
        $rawdata[$i] = $row;
        $i++;
    }
    disconnectDB($conexion);
    $jsonResponse = json_encode($rawdata);
    return jsonResponse;
}

?>