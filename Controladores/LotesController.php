<?php

    class LotesController{

        private $servicio;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/Servicios/ServicioLote.php");
            $this->servicio = new ServicioLote();
        }

        public function Registrar($nombre,$usuarioId,$cultivoId,$tamano)
        {
            $this->servicio->Crear($nombre,$usuarioId,$cultivoId,$tamano);
            $mensaje = "Registro Creado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function Editar($id,$nombre,$usuarioId,$cultivoId,$tamano)
        {   
            $this->servicio->Actualizar($id,$nombre,$usuarioId,$cultivoId,$tamano);
            $mensaje = "Registro Actualizado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function Eliminar ($id)
        {
            $this->servicio->Borrar($id);
            $mensaje = "Registro Eliminado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function ListarLotes($usuarioId)
        {
            $resultado = $this->servicio->Listar($usuarioId);
            return $resultado;
        }

        public function ObtenerLote($id)
        {
            $resultado = $this->servicio->Obtener($id);
            return $resultado;
        }

        public function ValidarCrear($usuarioId, $nombre)
        {
            $resultado = $this->servicio->ExisteCrear($usuarioId,$nombre);
            return $resultado;
        }

        public function ValidarEditar($nombre,$usuarioId,$id)
        {
            $resultado = $this->servicio->ExisteEditar($nombre,$usuarioId,$id);
            return $resultado;
        }

    }


?>