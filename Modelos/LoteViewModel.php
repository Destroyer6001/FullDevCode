<?php

    class Lote{

        private $id;
        private $nombre;
        private $usuarioId;
        private $cultivoid;
        private $tamano;

        public function __construct($id,$nombre,$usuarioId,$cultivoid,$tamano)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->usuarioId = $usuarioId;
            $this->cultivoid = $cultivoid;
            $this->tamano = $tamano;
        }

        public function GETId ()
        {
            return $this->id;
        }

        public function GETNombre ()
        {
            return $this->nombre;
        }

        public function GETUsuarioId ()
        {
            return $this->usuarioId;
        }

        public function GETCultivoId ()
        {
            return $this->cultivoid;
        }

        public function GETTamano ()
        {
            return $this->tamano;
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

        public function SETCultivoId($cultivoid)
        {
            $this->cultivoid = $cultivoid;
        }

        public function SETTamano($tamano)
        {
            $this->tamano = $tamano;
        }

    }


?>