<?php

require_once "libs/Database.php";
class Genero
{
    private $idGen;
    private $genero;

    public function __construct()
    {
    }

    public function find($id)
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
            $this->idGen = $db->lastInsertId();
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
