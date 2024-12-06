<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'class.conexion.php';

class Clientes extends Conexion {

    function __construct() {
        parent::__construct();
    }

    public function getClientes() {
        // Consulta para filtrar por tipo (solo clientes)
        $sql = "SELECT * FROM personas WHERE tipo = 1 ORDER BY idPersona DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado;
    }
        //CREATE = INSERT
        public function add($razonsocial, $ciruc, $domicilio, $telefono, $tipo) {
            // Insertamos los datos del cliente en la tabla personas
            $sql = "INSERT INTO personas (razonsocial, ciruc, domicilio, telefono, tipo) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('ssssi', $razonsocial, $ciruc, $domicilio, $telefono, $tipo);
            $stmt->execute();
            $stmt->close(); 
        }
                
    // UPDATE = UPDATE = EDIT
    public function edit($id, $razonsocial, $ciruc, $telefono, $domicilio, $tipo) {
        // Preparamos la consulta para actualizar todos los campos
        $sql = "UPDATE personas SET razonsocial = ?, ciruc = ?, telefono = ?, domicilio = ?, tipo = ? WHERE idPersona = ?";
        $stmt = $this->conexion->prepare($sql);
        
        // Vinculamos los parámetros con el tipo adecuado
        $stmt->bind_param('ssssii', $razonsocial, $ciruc, $telefono, $domicilio, $tipo, $id);
        
        // Ejecutamos la consulta
        $stmt->execute();
        
        // Cerramos la declaración
        $stmt->close();
    }

    //DELETE=DELETE
    public function del($id) {
        $sql = "DELETE FROM personas WHERE idPersona = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();



        // Verificamos si la consulta se preparó correctamente
        if ($stmt === false) {
            echo "Error en la preparación de la consulta: " . $this->conexion->error;
            return;
        }
        
        // Vinculamos los parámetros
        $stmt->bind_param('ssssi', $razonsocial, $ciruc, $telefono, $domicilio, $tipo);
        
        // Ejecutamos la consulta
        if ($stmt->execute()) {
            return true; // Inserción exitosa
        } else {
            echo "Error al insertar: " . $stmt->error;
            return false;
        }
    }
}