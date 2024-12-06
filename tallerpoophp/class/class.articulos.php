<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'class.conexion.php';

class Articulo extends Conexion {

    function __construct() {
        parent::__construct();
    }    
    
    public function getArticulos($sql = null) {
        try {
            if ($sql === null) {
                // Consulta predeterminada
                $sql = "SELECT id_Articulo, descripcion, preciocompra, precioventa FROM articulos";
            }
            $result = $this->conexion->query($sql);
            if (!$result) {
                throw new Exception("Error en la consulta: " . $this->conexion->error);
            }
            return $result;
        } catch (Exception $e) {
            die("Excepción: " . $e->getMessage());
        }
    }

        
    // Método para contar los artículos
    public function countArticulos($sWhere = '') {
        try {
            $sql = "SELECT COUNT(*) AS numrows FROM articulos $sWhere";
            $stmt = $this->conexion->prepare($sql);
            if (!$stmt) {
                throw new Exception("Error al preparar la consulta: " . $this->conexion->error);
            }
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($resultado->num_rows > 0) {
                $row = $resultado->fetch_assoc();
                return $row['numrows']; // Devuelve el conteo de filas
            } else {
                return 0; // No hay filas que contar
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
        // Insertar un nuevo artículo
        public function add($descripcion, $preciocompra, $precioventa, $id_Categoria) {
            $sql = "INSERT INTO articulos (descripcion, preciocompra, precioventa, id_Categoria) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('sddi', $descripcion, $preciocompra, $precioventa, $id_Categoria);
            $stmt->execute();
            $stmt->close();
        }
        
        public function edit($id_Articulo, $descripcion, $preciocompra, $precioventa, $id_Categoria) {
            $sql = "UPDATE articulos SET descripcion = ?, preciocompra = ?, precioventa = ?, id_Categoria = ? WHERE id_Articulo = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('sddii', $descripcion, $preciocompra, $precioventa, $id_Categoria, $id_Articulo);
            $stmt->execute();
            $stmt->close();
        }
        

    // Eliminar un artículo
    public function del($id) {
        $sql = "DELETE FROM articulos WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }

    
}
