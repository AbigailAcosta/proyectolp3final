<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];

    include '../class/class.categorias.php';
    $categoria = new Categoria();

    if (isset($_POST)) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre']; 
        $categoria->edit($id, $nombre);
    } else {
        echo '<script>alert("Error, no se actualizó registro!");</script>';
    }
    header('location: ../listacategorias.php');
?>