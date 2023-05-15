<?php
    class HerramientaController{
        private $servicio;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/Servicios/ServicioHerramienta.php");
            $this->servicio = new ServicioHerramienta();
        }

        public function Registrar($nombre,$fabricante,$cantidad,$fechadecompra,$usuarioId)
        {
            $this->servicio->Crear($nombre,$fabricante,$cantidad,$fechadecompra,$usuarioId);
            $mensaje = "Registro Creado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function Actualizar($id,$nombre,$fabricante,$cantidad,$fechadecompra,$usuarioId)
        {
            $this->servicio->Editar($id,$nombre,$fabricante,$cantidad,$fechadecompra,$usuarioId);
            $mensaje = "Registro Actualizado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function Eliminar($id)
        {
            $this->servicio->Borrar($id);
            $mensaje = "Registro Eliminado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function ListarHerramientas($usuarioId)
        {
            $listadoherramientas = $this->servicio->Listar($usuarioId);
            return $listadoherramientas;
        }

        public function ObtenerHerramienta($id)
        {
            $herramienta = $this->servicio->Obtener($id);
            return $herramienta;
        }

        public function ExisteCrear($nombre,$usuarioId,$fabricante)
        {
            $resultado = $this->servicio->ValidarCrear($nombre,$usuarioId,$fabricante);
            return $resultado;
        }

        public function ExisteEditar($nombre,$usuarioId,$fabricante,$id)
        {
            $resultado = $this->servicio->ValidarEditar($nombre,$usuarioId,$fabricante,$id);
            return $resultado;
        }
    }
?>
