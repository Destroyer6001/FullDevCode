<?php

    class MovimientosInventario
    {
        private $Id;
        private $Cantidad;
        private $FechaDeCambio;
        private $InventarioId;
        private $TipoDeMovimiento;

        public function __construct($id,$cantidad,$fechadecambio,$inventarioId,$tipodemovimiento)
        {
            $this->Id = $id;
            $this->Cantidad = $cantidad;
            $this->FechaDeCambio = $fechadecambio;
            $this->InventarioId = $inventarioId;
            $this->TipoDeMovimiento = $tipodemovimiento;
        }

        public function GETID(){
            return $this->Id;
        }

        public function GETCantidad(){
            return $this->Cantidad;
        }

        public function GETFechadecambio(){
            return $this->FechaDeCambio;
        }

        public function GETInventarioId(){
            return $this->InventarioId;
        }

        public function GETTipoDeMovimiento(){
            return $this->TipoDeMovimiento;
        }

        public function SETID($id)
        {
            $this->Id = $id;
        }

        public function SETCantidad($cantidad)
        {
            $this->Cantidad = $cantidad;
        }

        public function SETFechaDeCambio($fechadecambio)
        {
            $this->FechaDeCambio = $fechadecambio;
        }

        public function SETInventarioId($inventarioId)
        {
            $this->InventarioId = $inventarioId;
        }

        public function SETTipoDeMovimiento($tipodemovimiento)
        {
            $this->TipoDeMovimiento = $tipodemovimiento;
        }
    }


?>
