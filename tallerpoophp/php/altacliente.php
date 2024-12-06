<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Incluir la clase Clientes
    include '../class/class.clientes.php';
    $clientes = new Clientes();

    // Verificar si se envió el formulario
    if (isset($_POST)) {
        // Recibir los datos del formulario
        $nombre = $_POST['nombre'];
        $ciruc = $_POST['ciruc'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $tipo = $_POST['tipo'];

        // Llamar al método add de la clase Clientes para guardar el cliente
        $clientes->add($nombre, $ciruc, $direccion, $telefono, $tipo);
    } else {
        echo '<script>alert("Error, no se guardó el registro!");</script>';
    }

    // Redirigir a la lista de clientes
    header('Location: ../listaclientes.php');
?>
