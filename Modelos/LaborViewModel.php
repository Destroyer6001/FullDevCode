<?php

    class Labor{
        private $Id;
        private $Nombre;
        private $UsuarioId;

        public function __construct($id,$nombre,$usuarioId)
        {
            $this->Id = $id;
            $this->Nombre = $nombre;
            $this->UsuarioId = $usuarioId;
        }

        public function GETId(){
            return $this->Id;
        }

        public function GETNombre(){
            return $this->Nombre;
        }

        public function GETUsuarioId(){
            return $this->UsuarioId;
        }

        public function SETId($id)
        {
            $this->Id = $id;
        }

        public function SETNombre($nombre)
        {
            $this->Nombre = $nombre;
        }

        public function SETUsuarioId($usuarioId)
        {
            $this->UsuarioId = $usuarioId;
        }
    }



?>
