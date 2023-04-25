<?php

    class CultivoController{

        private $servicio;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/Servicios/ServicioCultivo.php");
            $this->servicio = new ServicioCultivos();
        }


        public function CrearCultivo ($nombre,$usuarioId)
        {
            $this->servicio->Crear($nombre,$usuarioId);
            $mensaje = "Registro Creado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function EditarCultivo ($nombre,$id,$usuarioId)
        {
            $this->servicio->Editar($id,$nombre,$usuarioId);
            $mensaje = "Registro Actualizado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function BorrarCultivo ($id)
        {
            $this->servicio->Eliminar($id);
            $mensaje = "Registro Eliminado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function ConsultarCultivo($id)
        {
            $resultado = $this->servicio->ObtenerCultivo($id);
            return $resultado;
        }

        public function ListarCultivos($usuarioId)
        {
            $resultado = $this->servicio->Listar($usuarioId);
            return $resultado;
        }

        public function ExisteEditar($nombre,$usuarioId,$id)
        {
            $resultado = $this->servicio->ValidarEditar($nombre,$usuarioId,$id);
            return $resultado;
        }

        public function ExisteCrear($nombre,$usuarioId)
        {
            $resultado = $this->servicio->ValidarCrear($nombre,$usuarioId);
            return $resultado;
        }

    }


?>