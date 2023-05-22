<?php

    class ServicioMovimiento
    {
        private $conexion;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/bd.php");
            $con = new BaseDeDatos();
            $this->conexion = $con->Conexion();
        }

        public function Movimiento($cantidad,$fechadecambios,$inventarioId,$tipodemovimiento)
        {
            $sentencia = $this->conexion->prepare("INSERT INTO movimientosdeinventario(Id,Cantidad,
            FechaDeCambio,InventarioId,TipoDeMovimiento) VALUES (null,:cantidad,:fechadecambio,:inventarioid,
            :tipodemovimiento)");
            $sentencia->bindParam(":cantidad",$cantidad);
            $sentencia->bindParam(":fechadecambio",$fechadecambios);
            $sentencia->bindParam(":inventarioid",$inventarioId);
            $sentencia->bindParam(":tipodemovimiento",$tipodemovimiento);
            $sentencia->execute();
        }

        public function MostrarMovimientos($inventarioId)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM movimientosdeinventario WHERE InventarioId = :inventarioid");
            $sentencia->bindParam(":inventarioid",$inventarioId);
            $sentencia->execute();
            $listadodemovimientos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $listadodemovimientos;
        }
    }



?>
