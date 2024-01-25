<?php
class EquipoModel
{
    protected $db;

    private $EQUIPO_ID;
    private $EQUIPO;

    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    public function getEquipoId()
    {
        return $this->EQUIPO_ID;
    }

    public function getEquipo()
    {
        return $this->EQUIPO;
    }

    public function setEquipo($nombreEquipo) {
        $this->EQUIPO = $nombreEquipo;
    }

    public function getById($codigo)
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM LIGA_EQUIPOS where EQUIPO_ID = ?');
        $consulta->bindParam(1, $codigo);
        $consulta->execute();

        $consulta->setFetchMode(PDO::FETCH_CLASS, "EquipoModel");
        $resultado = $consulta->fetch();


        return $resultado;
    }

    public function getAll()
    {
        $consulta = $this->db->prepare('SELECT * FROM LIGA_EQUIPOS');
        $consulta->execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "EquipoModel");
        return $resultado;
    }

    // Método para añadir un nuevo equipo o actualizar el nombre de uno existente
    public function save()
    {
        if (!isset($this->EQUIPO_ID)) {
            $consulta = $this->db->prepare('INSERT INTO LIGA_EQUIPOS(equipo) values (?)');
            $consulta->bindParam(1, $this->EQUIPO);
            $consulta->execute();
        } else {
            $consulta = $this->db->prepare('UPDATE LIGA_EQUIPOS SET equipo = ? WHERE equipo_id =  ?');
            $consulta->bindParam(1, $this->EQUIPO);
            $consulta->bindParam(2, $this->EQUIPO_ID);
            $consulta->execute();
        }
    }

}
?>