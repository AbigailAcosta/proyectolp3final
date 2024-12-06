<?php
require_once '../class/class.conexion.php';

class Compra extends Conexion {
    function __construct() {
        parent::__construct();
    }

    public function getFactura($numero_compra) {
        $sql = "SELECT id_Articulo, descripcion, precio_compra FROM articulos WHERE id_Articulo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id_Articulo);
        $stmt->execute();
        $resultado = $stmt->get_result();
    }        
    public function getFacturas() {
        $sql = 'select * from compras order by numero desc';
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    public function getFacturaSQL($sql) {
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    public function addFactura($numero, $fecha, $idproveedor, $estado, $idusuario) {
        $sql = "INSERT INTO compras VALUES (?,?,?,?,?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('ssiii', $numero, $fecha, $estado, $idusuario, $idproveedor);
        $stmt->execute();
        $stmt->close();
    }

    public function addDetalleFactura($numero, $id_Articulo, $unitario, $cantidad, $impuesto) {
        $sql = "INSERT INTO detallecompras (numero, id_Articulo, preciocompra, cantidad, impuesto) VALUES (?,?,?,?,?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('siiii', $numero, $id_Articulo, $unitario, $cantidad, $impuesto);
        $stmt->execute();
        $stmt->close();
    }
    
}
?>