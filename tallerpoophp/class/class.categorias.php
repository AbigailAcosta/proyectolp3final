<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'class.conexion.php';

class Categoria extends Conexion {

    function __construct() {
        parent::__construct();
    }

    //CREATE = INSERT
    public function add($nombre) {
        $sql = "INSERT INTO categorias VALUES (0,?,10)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
        $stmt->close(); 
    }

    //READ = SELECT
    public function getCategorias() {
        $sql = "SELECT * FROM categorias ORDER BY id_Categoria DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado;
    }

    public function getCategoria($id) {
        $sql = "SELECT * FROM categorias WHERE id_Categoria = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado;
    }

    // UPDATE = UPDATE = EDIT
    public function edit($id, $nombre) {
        $stmt = $this->conexion->prepare('UPDATE categorias SET nombre = ? WHERE id_Categoria = ?');
        $stmt->bind_param('si', $nombre, $id);
        $stmt->execute();
        $stmt->close();
    }

    //DELETE=DELETE
    public function del($id) {
        $sql = "DELETE FROM categorias WHERE id_Categoria = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>