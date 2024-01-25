<?php
class JornadaModel
{
    protected $db;

    private $JORNADA_ID;
    private $FECHA;

    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
    public function getJornada_ID()
    {
        return $this->JORNADA_ID;
    }

    public function getFecha() {
        return $this->FECHA;
    }


    public function getAll()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT *  FROM LIGA_JORNADAS order by jornada_id');
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "JornadaModel");
        return $resultado;
    }


    public function getUltimaJornada()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT MAX( JORNADA_ID ) as valor FROM LIGA_JORNADAS ');
        $consulta->execute();
        $valor = $consulta->fetch();

        $consulta = $this->db->prepare('SELECT * FROM LIGA_JORNADAS WHERE JORNADA_ID = ?');
        $consulta->bindParam(1, $valor['valor']);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS, "JornadaModel");
        $resultado = $consulta->fetch();

        return $resultado;
    }
}
