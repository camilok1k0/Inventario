<?php
class TarjetaAlmacenajeModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }
    public function selectTarjetaAlmacenaje()
    {
        $sql = "SELECT * FROM tarjetaalmacenaje";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarTarjetaAlmacenaje($nombreProducto, $fecha, $fechaVencimiento, $Referencia, $Entrada, $Salida, $existencias, $costoUnitario, $costoPromedio, $debe, $haber, $saldo, $idUsuario) {
        
        $query = "INSERT INTO tarjetaalmacenaje(nombreProducto, fecha, fechaVencimiento, Referencia, Entrada, Salida, existencias, costoUnitario, costoPromedio, debe, haber, saldo, idUsuario) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $data = array($nombreProducto, $fecha, $fechaVencimiento, $Referencia, $Entrada, $Salida, $existencias, $costoUnitario, $costoPromedio, $debe, $haber, $saldo, $idUsuario);
        $this->insert($query, $data);
        return true;
    }
    public function obtenerProveedores() 
    {
        $sql = "SELECT id, nombre FROM proveedores";
        $res = $this->select_all($sql);
        return $res;   
    }
    public function editTarjetaAlmacenaje(int $id)
    {
        $sql = "SELECT * FROM tarjetaalmacenaje WHERE id = ?";
        $res = $this->select($sql, [$id]);
        return $res;
    }
    public function actualizarTarjetaAlmacenaje($nombreProducto, $fecha, $fechaVencimiento, $Referencia, $Entrada, $Salida, $existencias, $costoUnitario, $costoPromedio, $debe, $haber, $saldo, $idUsuario, $id) {
        $query = "UPDATE tarjetaalmacenaje SET nombreProducto = ?, fecha = ?, fechaVencimiento = ?, Referencia = ?, Entrada = ?, Salida = ?, existencias = ?, costoUnitario = ?, costoPromedio = ?, debe = ?, haber = ?, saldo = ?, idUsuario = ? WHERE id = ?";
        $data = array($nombreProducto, $fecha, $fechaVencimiento, $Referencia, $Entrada, $Salida, $existencias, $costoUnitario, $costoPromedio, $debe, $haber, $saldo, $idUsuario, $id);
        $this->update($query, $data);
        return true;
    }
    public function estadoTarjetaAlmacenaje(int $estado, int $id)
    {
        $query = "UPDATE tarjetaalmacenaje SET estado = ? WHERE id = ?";
        $data = array($estado, $id);
        $this->update($query, $data);
        return true;
    }

}
?>