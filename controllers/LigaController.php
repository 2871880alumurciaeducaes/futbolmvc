<?php
class LigaController
{
    protected $view;

    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }



    public function clasificacion()
    {
        //Incluye el modelo que corresponde
        require 'models/JornadaModel.php';
        require 'models/PartidoModel.php';

        //Creamos una instancia de nuestro "modelo"
        $jornadas = new JornadaModel();
        $partido = new PartidoModel();


        $clasificacion = $partido->getClasificacion();



        //Finalmente presentamos nuestra plantilla
        $this->view->show("clasificacionLigaView.php", ['clasificacion' => $clasificacion]);
    }
    
    // Método para mostrar la pantalla de inicio
    public function saludoInicial()
    {
    }
}
