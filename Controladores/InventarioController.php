<?php

    class InventarioController{

        private $servicioInventario;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/Servicios/ServicioInventario.php");
            $this->servicioInventario = new ServicioInventario();
        }

        public function Registrar($nombre,$distribuidor,$cantidad,$fechadecompra,$fechadevencimiento,
        $usuarioId,$lote)
        {
            $this->servicioInventario->Crear($nombre,$distribuidor,$cantidad,$fechadecompra,$fechadevencimiento,
            $usuarioId,$lote);
            $mensaje = "Registro Creado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function Actualizar($id,$nombre,$distribuidor,$fechadecompra,$fechadevencimiento,$usuarioId,
        $lote)
        {
            $this->servicioInventario->Editar($id,$nombre,$distribuidor,$fechadecompra,$fechadevencimiento,$usuarioId,$lote);
            $mensaje = "Registro Actualizado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function Obtener($id)
        {
            $objeto_Inventario = $this->servicioInventario->ObtenerInventario($id);
            return $objeto_Inventario;
        }

        public function Listar($usuarioId)
        {
            $listado_inventario = $this->servicioInventario->ListarInventario($usuarioId);
            return $listado_inventario;
        }

        public function Eliminar($id)
        {
            $this->servicioInventario->Eliminar($id);
            $mensaje = "Registro Eliminado";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function ActualizarExistencias($id,$cantidad)
        {
            $this->servicioInventario->CambiarCantidad($id,$cantidad);
            $mensaje = "Existencias Del Producto Actualizadas";
            header("Location:index.php?mensaje=".$mensaje);
        }

        public function ValidarCrear($usuarioId,$lote)
        {
            $validacion = $this->servicioInventario->ValidarCrear($usuarioId,$lote);
            return $validacion;
        }

        public function ValidarEditar($usuarioId,$lote,$id)
        {
            $validacion = $this->servicioInventario->ValidarEditar($usuarioId,$lote,$id);
            return $validacion;
        }
    }

?>
