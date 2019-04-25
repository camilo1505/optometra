<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { } else {
	echo "<script>
            alert('Inicie Sesion para Continuar');
            window.location.href='../../../login.html';
        </script>";
	exit;
	exit;
}
    include("../BDservices.php");
    $referencia = $_POST["referencia"];
    $marca = $_POST["marca"];
    $imagen = $_FILES["imagen"];
    $costo = $_POST["costo"];
    $descripcion = $_POST["descripcion"];
    $producto = $_POST["producto"];

    $catalogo = array();

    $cedula = $_SESSION['cedula'];

    $sql = "SELECT * FROM usuario WHERE cedula  =  '$cedula'";

    $id_usuario = getData($sql, 'root', '');

    array_push($catalogo,$producto);
    array_push($catalogo,$id_usuario[0]['id_usuario']);
    array_push($catalogo,$referencia);
    array_push($catalogo,$marca);
    array_push($catalogo,$imagen["name"]);
    array_push($catalogo,$costo);
    array_push($catalogo,$descripcion);

    print_r($catalogo);

    $done = newCatalogo($catalogo);
 
    if($done) {
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='addCatalogo.php';
            </script>
        ";
    }
    if(! $done) {
        echo "
            <script>
                alert('Error Guardando el Producto');
                window.location.href='addCatalogo.php';
            </script>
        ";
    }

?>