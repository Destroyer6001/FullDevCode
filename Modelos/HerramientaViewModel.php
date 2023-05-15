<?php

    class Herramienta{
        private $Id;
        private $Nombre;
        private $Fabricante;
        private $Cantidad;
        private $FechaDeCompra;
        private $UsuarioId;

        public function __construct($id,$nombre,$fabricante,$cantidad,$fechadecompra,$usuarioId)
        {
            $this->Nombre = $nombre;
            $this->Id = $id;
            $this->Fabricante = $fabricante;
            $this->Cantidad = $cantidad;
            $this->FechaDeCompra = $fechadecompra;
            $this->UsuarioId = $usuarioId;
        }

        public function GETNombre ()
        {
            return $this->Nombre;
        }

        public function GETId ()
        {
            return $this->Id;
        }

        public function GETFabricante ()
        {
            return $this->Fabricante;
        }

        public function GETCantidad ()
        {
            return $this->Cantidad;
        }

        public function GETFechaDeCompra ()
        {
            return $this->FechaDeCompra;
        }

        public function GETUsuarioId ()
        {
            return $this->UsuarioId;
        }

        public function SETNombre ($nombre)
        {
            $this->Nombre = $nombre;
        }

        public function SETId ($id)
        {
            $this->Id = $id;
        }

        public function SETFabricante ($fabricante)
        {
            $this->Fabricante = $fabricante;
        }

        public function SETFechaDeCompar ($fechadecompra)
        {
            $this->FechaDeCompra = $fechadecompra;
        }

        public function SETCantidad ($cantidad)
        {
            $this->Cantidad = $cantidad;
        }

        public function SETUsuarioId ($usuarioId)
        {
            $this->UsuarioId = $usuarioId;
        }
    }

?>
