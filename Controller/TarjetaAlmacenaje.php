<?php
class TarjetaAlmacenaje extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }

    public function tarjetaalmacenaje()
    {
        $data = $this->model->selectTarjetaAlmacenaje();
        // $data['proveedores'] = $this->model->obtenerProveedores(); // Agregar esta línea
        $this->views->getView($this, "listar", $data);
    }
    public function mostrarFormulario()
    {
        $proveedores = $this->model->obtenerProveedores();
        $this->views->getView($this, "listar", ['proveedores' => $proveedores]);
    }


    public function registrar() {
        $idUsuario = $_SESSION['id']; // Asumiendo que al iniciar sesión, guardas el id del usuario en $_SESSION['idUsuario']
        $nombreProducto = $_POST['nombreProducto'];
        $idProveedor = $_POST['idProveedor'];
        $fecha = $_POST['fecha'];
        $fechaVencimiento = $_POST['fechaVencimiento'];
        $Referencia = $_POST['Referencia']; // Asegúrate de que este campo existe en tu formulario
        $Entrada = $_POST['Entrada'];
        $Salida = $_POST['Salida'];
        $existencias = $_POST['existencias'];
        $costoUnitario = $_POST['costoUnitario'];
        $costoPromedio = $_POST['costoPromedio'];
        $debe = $_POST['debe'] ?? null; // Asume null si no se proporciona
        $haber = $_POST['haber'] ?? null; // Asume null si no se proporciona
        $saldo = $_POST['saldo'];
        // $descripcion = $_POST['descripcion'];


        $insert = $this->model->insertarTarjetaAlmacenaje($nombreProducto, $fecha, $fechaVencimiento, $Referencia, $Entrada, $Salida, $existencias, $costoUnitario, $costoPromedio, $debe, $haber, $saldo, $idUsuario, $idProveedor);
        
        if ($insert) {
            header("location: " . base_url() . "tarjetaalmacenaje");
            die();    
        }
        // Considera manejar el caso en el que la inserción falle
    }

    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editTarjetaAlmacenaje($id);
        if ($data == 0) {
            $this->tarjetaalmacenaje();
        } else {
            $this->views->getView($this, "editar", $data);
        }
    }

    public function modificar() {
        $id = $_POST['id'];
        $nombreProducto = $_POST['nombreProducto'];
        $idProveedor = $_POST['idProveedor'];
        $fecha = $_POST['fecha'];
        $fechaVencimiento = $_POST['fechaVencimiento'];
        $Referencia = $_POST['Referencia'];
        $Entrada = $_POST['Entrada'];
        $Salida = $_POST['Salida'];
        $existencias = $_POST['existencias'];
        $costoUnitario = $_POST['costoUnitario'];
        $costoPromedio = $_POST['costoPromedio'];
        $debe = $_POST['debe'] ?? null; // Asume null si no se proporciona
        $haber = $_POST['haber'] ?? null; // Asume null si no se proporciona
        $saldo = $_POST['saldo'];
        $idUsuario = $_SESSION['id']; // Suponiendo que el ID de usuario aún se almacena en la sesión
        // $descripcion = $_POST['descripcion']; // Si tienes un campo para descripción en tu formulario
    

        $actualizar = $this->model->actualizarTarjetaAlmacenaje($nombreProducto, $fecha, $fechaVencimiento, $Referencia, $Entrada, $Salida, $existencias, $costoUnitario, $costoPromedio, $debe, $haber, $saldo, $idUsuario, $id, $idProveedor);
        
        if ($actualizar) {
            header("location: " . base_url() . "tarjetaalmacenaje"); 
            die();
        }
        // Considera manejar el caso en el que la actualización falle
    }

  
    public function eliminar()
    {
        $id = $_POST['id'];
        $this->model->estadoTarjetaAlmacenaje(0, $id);
        header("location: " . base_url() . "tarjetaalmacenaje");
        die();
    }

    public function reingresar()
    {
        $id = $_POST['id'];
        $this->model->estadoTarjetaAlmacenaje(1, $id);
        header("location: " . base_url() . "tarjetaalmacenaje");
        die();
    }
}
?>
