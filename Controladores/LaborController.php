<?php
    class LaborController
    {
        private $Servicio;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/Servicios/ServicioLabor.php");
            $this->Servicio = new ServicioLabor();
        }

        public function Registrar($nombre, $usuarioId)
        {
            $this->Servicio->Crear($nombre,$usuarioId);
            $mensaje = "Registro Creado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function Actualizar($nombre,$id,$usuarioId)
        {
            $this->Servicio->Editar($nombre,$id,$usuarioId);
            $mensaje = "Registro Actualizado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function Eliminar($id)
        {
            $this->Servicio->Borrar($id);
            $mensaje = "Registro Eliminado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function ListarLabores($usuarioId)
        {
            $labores = $this->Servicio->Listar($usuarioId);
            return $labores;
        }

        public function ConsultarLabor($id)
        {
            $labor = $this->Servicio->ObtenerLabor($id);
            return $labor;
        }

        public function ValidarCrear($nombre,$usuarioId)
        {
            $validacion = $this->Servicio->ExisteCrear($nombre,$usuarioId);
            return $validacion;
        }

        public function ValidarEditar($id,$nombre,$usuarioId)
        {
            $validacion = $this->Servicio->ExisteEditar($id,$nombre,$usuarioId);
            return $validacion;
        }
    }


?>
