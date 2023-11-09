<?php
class AlertasdeCaducidadModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectAlertasDeCaducidad() {
        $sql = "SELECT id, Referencia, descripcion, fecha, fechaVencimiento, existencias FROM tarjetaalmacenaje ORDER BY fechaVencimiento ASC";
        return $this->select_all($sql);
    }    

    public function getAlertasdeCaducidad()
    {
        // Obtener la fecha actual para comparar
        $fecha_actual = date('Y-m-d');
        $sql = "SELECT id, Referencia, descripcion, fecha, fechaVencimiento, existencias FROM tarjeta_almacenaje WHERE fechaVencimiento BETWEEN ? AND DATE_ADD(?, INTERVAL 30 DAY)";
        $arrData = array($fecha_actual, $fecha_actual);
        $request = $this->select_all($sql, $arrData);
        return $request;
    }

    public function deleteAlerta($id)
    {
        $sql = "DELETE FROM tarjeta_almacenaje WHERE id = ?";
        $arrData = array($id);
        $request = $this->delete($sql, $arrData);
        return $request;
    }
}
?>