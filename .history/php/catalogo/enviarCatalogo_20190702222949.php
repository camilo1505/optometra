<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { } else {
	echo "<script>
            alert('Inicie Sesion para Continuar');
            window.location.href='../../../login.html';
        </script>";
	exit;
}
    include("../BDservices.php");
    $referencia = $_POST["referencia"];
    $marca = $_POST["marca"];
    $imagen = $_FILES["imagen"];
    $costo = $_POST["costo"];
    $descripcion = $_POST["descripcion"];
    $producto = $_POST["producto"];

    $target_dir = "uploads/";
    $target_file = $target_dir.$referencia.basename($imagen["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $catalogo = array();

    $cedula = $_SESSION['cedula'];

    $sql = "SELECT * FROM usuario WHERE cedula  =  '$cedula'";

    $id_usuario = getData($sql, 'jp', '1234');

    array_push($catalogo,$producto);
    array_push($catalogo,$id_usuario[0]['id_usuario']);
    array_push($catalogo,$referencia);
    array_push($catalogo,$marca);
    array_push($catalogo,$target_file);
    array_push($catalogo,$costo);
    array_push($catalogo,$descripcion);

    $done = newCatalogo($catalogo);
 
    if($done) {
        move_uploaded_file($imagen["tmp_name"], "../../".$target_file);
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