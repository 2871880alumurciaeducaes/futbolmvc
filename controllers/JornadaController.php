<?php
class JornadaController
{
    protected $view;

    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }

    public function listarAll()
    {
        //Incluye el modelo que corresponde
        require 'models/JornadaModel.php';

        //Creamos una instancia de nuestro "modelo"
        $jornadas = new JornadaModel();

        //Le pedimos al modelo todos los items
        $listado = $jornadas->getAll();

        //Pasamos a la vista toda la información que se desea representar
        $data['jornadas'] = $listado;


        //Finalmente presentamos nuestra plantilla
        $this->view->show("listaJornadasView.php", $data);
    }

    public function listar() {
        
        if (isset($_GET['jornada_id'])) {
            require 'models/PartidoModel.php';
            $partidos = new ZonasModel();
            $resultado = $partidos->getPartidosByJornada($_GET['jornada_id']);

            $data['partidos'] = $resultado;
            $this->view->show('listaPartidosJornadaView.php', $data);
        }
        
    }
}
