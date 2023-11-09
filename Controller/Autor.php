<?php
class Proveedor extends Controllers{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }
    public function proveedor()
    {
        $data = $this->model->selectProveedor();         
        $this->views->getView($this, "listar", $data);
    }
    public function registrar()
    {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fechainicio = $_POST['fechainicio']; // Asegúrate de que este campo se maneje correctamente en la vista y en la base de datos
        $cantpedidos = $_POST['cantpedidos']; // Asegúrate de que este campo se maneje correctamente en la vista y en la base de datos

        $insert = $this->model->insertarProveedor($nombre, $apellidos, $fechainicio, $cantpedidos);
        if ($insert) {
            header("location: " . base_url() . "proveedor");
            die();
        }
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editProveedor($id);
        if ($data == 0) {
            $this->proveedor();
        } else {
            $this->views->getView($this, "editar", $data);
        }
    }
    public function modificar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fechainicio = $_POST['fechainicio'];
        $cantpedidos = $_POST['cantpedidos'];

        $actualizar = $this->model->actualizarProveedor($nombre, $apellidos, $fechainicio, $cantpedidos, $id);
        if ($actualizar) {
            header("location: " . base_url() . "proveedor");
            die();
        }
    }
    public function eliminar()
    {
        $id = $_POST['id'];
        $this->model->estadoProveedor(0, $id);
        header("location: " . base_url() . "proveedor");
        die();
    }
    public function reingresar()
    {
        $id = $_POST['id'];
        $this->model->estadoProveedor(1, $id);
        header("location: " . base_url() . "proveedor");
        die();
    }
}
