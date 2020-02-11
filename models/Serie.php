<?php

require_once "libs/Database.php";
class Serie
{
    private $idSer;
    private $titulo;
    private $fecha;
    private $temporadas;
    private $puntuacion;
    private $argumento;
    private $plataforma;


    public function __construct()
    {
    }
    public function findAll()
    {
        $db = new Database();
        $db->query("SELECT titulo, puntuacion, plataforma FROM genero");
        $listado = [];
        while ($serie =  $db->getObject("Serie"))
        {
            array_push($listado, $serie);
        }
        return $listado;
    }

    public function find($id) //en principio no es necesario este metodo
    {
        $db = new Database();
        $db->query("SELECT idGen, genero FROM genero WHERE idGen = $id");
        return $db->getObject("Genero");
    }

    public function save()
    {
        $db = new Database();
        //insert
        if (is_null($this->idGen)) {
            //insert
            $db->query("INSERT INTO genero (genero) VALUES {$this->genero}");
            //asignar el último id insertado en la bd
            $this->idGen = $db->lastId();
        } else {
            //update
            $db->query("UPDATE genero SET genero={$this->genero} WHERE idGen={$this->idGen}");
        }
    }

    public function delete()
    {
        $db = new Database();

        //borrado
        $db->query("DELETE FROM genero WHERE idGen={$this->idGen}");
    }
}
