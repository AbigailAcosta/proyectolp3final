<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../class/class.articulos.php';
$articulos = new Articulo();

if (isset($_POST)) {
    $descripcion = $_POST['descripcion'];
    $preciocompra = $_POST['preciocompra'];
    $precioventa = $_POST['precioventa'];
    $id_Categoria = $_POST['id_Categoria'];
    $articulos->add($descripcion, $preciocompra, $precioventa, $id_Categoria);
} else {
    echo '<script>alert("Error, no se guardó registro!");</script>';
}

header('location: ../listaarticulos.php');
?>
