<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../class/class.articulos.php';
$articulo = new Articulo();

if (isset($_POST)) {
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $precioventa = $_POST['precioventa'];
    $id_Categoria = $_POST['id_Categoria'];
    $articulo->edit($id, $descripcion, $preciocompra, $precioventa, $id_Categoria);
} else {
    echo '<script>alert("Error, no se actualizó registro!");</script>';
}

header('location: ../listaarticulos.php');
?>
