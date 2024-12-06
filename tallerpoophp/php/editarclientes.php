<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_REQUEST['id'];
$razonsocial = $_POST['razonsocial'];  
$ciruc = $_POST['ciruc'];
$telefono = $_POST['telefono'];
$domicilio = $_POST['domicilio'];
$tipo = $_POST['tipo'];

include '../class/class.clientes.php';
$clientes = new Clientes();

// Verifica si el formulario fue enviado correctamente
if (isset($_POST['id'])) {
    // Llamamos a la función edit pasándole todos los parámetros necesarios
    $clientes->edit($id, $razonsocial, $ciruc, $telefono, $domicilio, $tipo);
    header('location: ../listaclientes.php');  // Redirige a la lista después de editar
} else {
    echo '<script>alert("Error, no se actualizó el registro!");</script>';
}
?>
