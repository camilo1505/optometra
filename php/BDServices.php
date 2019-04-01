<?php
include("BDconection.php");

function getData($sql) {
    $conexion = conectarBDAdministrador();

    mysqli_set_charset($conexion, "utf8");

    if(!$result = mysqli_query($conexion, $sql)) die();

    $rawdata = array();

    $i=0;
    while($row = mysqli_fetch_array($result)) {
        $rawdata[$i] = $row;
        $i++;
    }
    disconnectDB($conexion);
    jsonResponse = json_encode($rawdata);
    return jsonResponse;
}
?>