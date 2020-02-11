<?php

    class Database
    {
        private $conexion;
        private $resultado;

        public function __construct($host = "localhost", $dbName = "misseries", $user = "root", $pass = "")
        {
            $this->conexion = new PDO("mysql:host=".$host.";dbname=".$dbName.";charset=utf8", $user, $pass)
                        or die("Error en la conexión con la base de datos");
        }

        public function __destruct()
        {
            $this->conexion = null;
        }

        public function query($sql)
        {
            $this->resultado = $this->conexion->query($sql);
        }

        public function getObject($class = 'stdClass')
        {
            return $this->resultado->fetchObject($class);
        }

        public function lastId()
		{
			return $this->pdo->lastInsertId() ;
		}
    }