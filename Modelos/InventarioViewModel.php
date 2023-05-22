<?php

    class Inventario{

        private $Id;
        private $Nombre;
        private $Distribuidor;
        private $FechaDeCompra;
        private $Cantidad;
        private $FechaDeVencimiento;
        private $UsuarioId;
        private $Lote;

        public function __construct($id,$nombre,$distribuidor,$fechadecompra,$cantidad,$fechadevencimiento,$usuarioId,$lote)
        {
            $this->Id = $id;
            $this->Nombre = $nombre;
            $this->Distribuidor = $distribuidor;
            $this->FechaDeCompra = $fechadecompra;
            $this->Cantidad = $cantidad;
            $this->FechaDeVencimiento = $fechadevencimiento;
            $this->UsuarioId = $usuarioId;
            $this->Lote = $lote;
        }

        public function GETId()
        {
            return $this->Id;
        }

        public function SETId($id)
        {
            $this->Id = $id;
        }

        public function GETNombre()
        {
            return $this->Nombre;
        }

        public function SETNombre($nombre)
        {
            $this->Nombre = $nombre;
        }

        public function GETDistribuidor()
        {
            return $this->Distribuidor;
        }

        public function SETDistribuidor($distribuidor)
        {
            $this->Distribuidor = $distribuidor;
        }

        public function GETFechaDeCompra()
        {
            return $this->FechaDeCompra;
        }

        public function SETFechaDeCompra($fechadecompra)
        {
            $this->FechaDeCompra = $fechadecompra;
        }

        public function GETCantidad()
        {
            return $this->Cantidad;
        }

        public function SETCantidad($cantidad)
        {
            $this->Cantidad = $cantidad;
        }

        public function GETFechaDeVencimiento()
        {
            return $this->FechaDeVencimiento;
        }

        public function SETFechaDeVencimiento($fechadevencimiento)
        {
            $this->FechaDeVencimiento = $fechadevencimiento;
        }

        public function GETUsuarioId()
        {
            return $this->UsuarioId;
        }

        public function SETUsuarioId($usuarioId)
        {
            $this->UsuarioId = $usuarioId;
        }

        public function GETLote()
        {
            return $this->Lote;
        }

        public function SETLote($lote)
        {
            $this->Lote = $lote;
        }

    }
?>
