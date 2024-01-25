<?php
class EquipoController
{
    protected $view;

    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }


    public function listar()
    {
        //Incluye el modelo que corresponde
        require 'models/EquipoModel.php';

        //Creamos una instancia de nuestro "modelo"
        $equipos = new EquipoModel();

        //Le pedimos al modelo todos los items
        $listado = $equipos->getAll();

        //Pasamos a la vista toda la información que se desea representar
        $data['equipos'] = $listado;


        //Finalmente presentamos nuestra plantilla
        $this->view->show("listaEquiposView.php", $data);
        //$this->view->show("equiposListadoView.php", array(  'items' => $listado)  );
    }

    // Método para editar un equipo
    public function editar()
    {
        //Incluye el modelo que corresponde
        require 'models/EquipoModel.php';

        //Creamos una instancia de nuestro "modelo"
        $equipos = new EquipoModel();

        // Si venimos del formulario de edición actualizamos
        if (isset($_REQUEST['submit'])) {
            // Comprobamos si se ha puesto nombre al equipo
            if (!isset($_REQUEST['equipo']) || empty($_REQUEST['equipo']))
                $errores['equipo'] = "* Equipo: Hay que indicar un nombre de equipo";
            if (empty($errores)) {
                // Si no hay errores actualizamos el nombre y guardamos en el modelo
                $equipoToUpdate = $equipos->getById($_REQUEST['equipo_id']);
                $equipoToUpdate->setEquipo($_REQUEST['equipo']);
                $equipoToUpdate->save();
                header("Location: index.php?controlador=equipo&accion=listar");
            }
        } else {
            // Si hemos solicitado editar un equipo
            //Le pedimos al modelo el equipo con el código concreto
            $equipoToEdit = $equipos->getById($_GET['equipo_id']);

            //Pasamos a la vista toda la información que se desea representar
            $data['equipo'] = $equipoToEdit;

            //Finalmente presentamos nuestra plantilla
            if ($equipoToEdit != false)
                $this->view->show("editarEquipoView.php", $data);
            else
                $this->view->show("errorView.php", array("error" => "No existe codigo", "enlace" => "index.php?controlador=equipo&action=listar"));
        }
    }

    // Método que recibe un nuevo equipo para insertar
    public function nuevo()
    {
        require 'models/EquipoModel.php';
        $equipo = new EquipoModel();
        $errores = array();

        if (isset($_REQUEST['submit'])) {
            if (!isset($_REQUEST['equipo']) || empty($_REQUEST['equipo']))
                $errores['equipo'] = "* Equipo: Hay que indicar un nombre de equipo";
            if (empty($errores)) {
                $equipo->setEquipo($_REQUEST['equipo']);
                $equipo->save();
                header("Location: index.php?controlador=equipo&accion=listar");
            }
        }

        $this->view->show("nuevoEquipoView.php", array('errores' => $errores));
    }
}
