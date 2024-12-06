<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include '../class/class.categorias.php';
    $categoria = new Categoria();

    if (isset($_POST)) {
        $nombre = $_POST['nombre'];
        $categoria->add($nombre);
    } else {
        echo '<script>alert("Error, no se guardó el registro!");</script>';
    }
    header('location: ../listacategorias.php');
?>