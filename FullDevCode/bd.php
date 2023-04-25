<?php

    class BaseDeDatos 
    {
        private $servidor = "localhost";
        private $basededatos = "fulldevcodebd";
        private $usuario = "root";
        private $contasenia = "";

        public function Conexion(){
            try{
                $conexion = new PDO("mysql:host=".$this->servidor.";dbname=".$this->basededatos,$this->usuario,$this->contasenia);
                return $conexion;
            }
            catch(Exception $ex){
                return $ex->getMessage();
            }
        }
    }

?>