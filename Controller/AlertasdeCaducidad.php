<?php
// Asegúrate de que el nombre del archivo coincida exactamente con el nombre de la clase.
class AlertasdeCaducidad extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }

    // Utiliza camelCase para los nombres de los métodos según las convenciones de PHP.
    public function alertasDeCaducidad()
    {
        error_log("Entrando en el método AlertasdeCaducidad");
        $data = $this->model->selectAlertasDeCaducidad();
        if (!$data) {
            error_log("No se encontraron datos en selectAlertasDeCaducidad");
        }
        // Asegúrate de que la vista 'listar' exista y que esté en la ubicación correcta.
        $this->views->getView($this, "listar", $data);
    }

    public function eliminar($id)
    {
        $this->model->deleteAlerta($id);
        // Asegúrate de que la URL sea correcta después de la eliminación.
        header("location: " . base_url() . "AlertasdeCaducidad");
    }
}
?>
