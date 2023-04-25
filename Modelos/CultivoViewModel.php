<?php 

    class Cultivo{
        private $id;
        private $usuarioId;
        private $nombre;

        public function __construct($id, $nombre, $usuarioId)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->usuarioId = $usuarioId;
        }

        public function GETId()
        {
            return $this->id;
        }

        public function GETNombre()
        {
            return $this->nombre;
        }

        public function GETUsuarioId()
        {
            return $this->usuarioId;
        }

        public function SETId($id)
        {
            $this->id = $id;
        }

        public function SETNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function SETUsuarioId($usuarioId)
        {
            $this->usuarioId = $usuarioId;
        }
    }


?>