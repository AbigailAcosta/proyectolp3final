<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include '../class/class.clientes.php';
    $clientes = new Clientes();

    // Verificar si se recibió el parámetro `id` correctamente
    if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']); // Convertir a entero para evitar inyección de código
        $resultado = $clientes->del($id); // Ejecutar la eliminación

        // Verificar si la eliminación fue exitosa
        if ($resultado) {
            echo json_encode([ 
                "status" => "success",
                "message" => "Cliente eliminado correctamente."
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "No se pudo eliminar el cliente. Verifica que exista o intenta nuevamente."
            ]);
        }
    } else {
        // Enviar un mensaje de error si el ID no está presente o es inválido
        echo json_encode([
            "status" => "error",
            "message" => "Parámetro 'id' no válido o no recibido."
        ]);
    }
?>
