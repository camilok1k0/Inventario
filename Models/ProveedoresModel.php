<?php
class ProveedoresModel extends Mysql {
    public $nombre, $apellidos, $fechainicio, $cantpedidos;
    public function __construct() 
    {
        parent::__construct();
    }
    public function selectProveedores() 
    {
        $sql = "SELECT * FROM proveedores";
        $res = $this->select_all($sql);
        return $res;
    }
    public function insertarProveedores( $nombre, $apellidos, $fechainicio, $cantpedidos){
 
        $query = "INSERT INTO proveedores(nombre, apellidos, fechainicio, cantpedidos) VALUES (?, ?, ?, ?)";
        $data = array($nombre, $apellidos, $fechainicio, $cantpedidos);  
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }
    public function editProveedor(int $id) 
    {
        $sql = "SELECT * FROM proveedores WHERE id = $id";
        $res = $this->select($sql, [$id]);
        return $res;
    }
    public function actualizarProveedor($nombre, $apellidos, $fechainicio,  $cantpedidos,  $id) {  
        $query = "UPDATE proveedores SET nombre=?, apellidos=?, fechainicio=?, cantpedidos=? WHERE id = ?";
        $data = array($nombre, $apellidos, $fechainicio, $cantpedidos, $id);
        $this->update($query, $data);
        return true;
    }

    
    public function eliminarProveedor($id)
     {
        $query = "DELETE FROM proveedores WHERE id = ?";
        $this->delete($query, array($id));
        return true;
    }
}
?>