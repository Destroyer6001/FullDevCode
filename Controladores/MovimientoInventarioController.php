<?php

    class MovimientosInventarioController{

        private $servicios;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/Servicios/ServicioMovimientoInventario.php");
            $this->servicios = new ServicioMovimiento();
        }

        public function RegistrarMovimiento($cantidad,$fechadecambio,$inventarioid,$tipodemovimiento)
        {
            $this->servicios->Movimiento($cantidad,$fechadecambio,$inventarioid,$tipodemovimiento);
        }

        public function ListarMovimientos($inventarioid)
        {
            $listadodemovimiento = $this->servicios->MostrarMovimientos($inventarioid);
            return $listadodemovimiento;
        }
    }


?>
