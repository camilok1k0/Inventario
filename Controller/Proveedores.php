<?php
class Proveedores extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }
    public function listar()
    {
        $data = $this->model->selectProveedores();
        $this->views->getView($this, "listar", $data);
    }

    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fechainicio = $_POST['fechainicio'];
        $cantpedidos = $_POST['cantpedidos'];
        $this->model->insertarProveedores($nombre, $apellidos, $fechainicio, $cantpedidos);
        header("location: " . base_url() . "proveedores/listar");
        die();
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editProveedor($id);
        if ($data == 0) {
            $this->listar();
        } else {
            $this->views->getView($this, "editar", $data);
        }
        header("location: " . base_url() . "proveedores/editar");
            die();  
    }

    public function modificar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fechainicio = $_POST['fechainicio'];
        $cantpedidos = $_POST['cantpedidos'];
        $actualizar = $this->model->actualizarProveedor($nombre, $apellidos, $fechainicio, $cantpedidos, $id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert =  'error';
        }
        header("location: " . base_url() . "proveedores/listar");
        die();
    }

    public function eliminar()
    {
        $id = $_POST['id'];
        $this->model->eliminarProveedor($id);
        header("location: " . base_url() . "proveedores/listar");
        die();
    }
    

}
?>