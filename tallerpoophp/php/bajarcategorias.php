<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include '../class/class.categorias.php';
    $categoria = new Categoria();

    if (isset($_REQUEST)) {
        $id = $_REQUEST['id'];
        $categoria->del($id);
    } else {
        echo '<script>alert("Error, ¡no se borró registro!");</script>';
    }

    //header('location: ../listarubros.php');
?>