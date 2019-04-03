<?php
              include("php/BDServices.php");
              $catalogo = getCatalogo();
              print_r($catalogo);
              echo $catalogo[0]["nombre_producto"]
?>