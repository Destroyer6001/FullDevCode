<?php

    class ServicioInventario
    {
        private $conexion;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/bd.php");
            $con = new BaseDeDatos();
            $this->conexion = $con->Conexion();
        }

        public function Crear($nombre,$distribuidor,$cantidad,$fechadecompra,$fechadevencimiento,$usuarioId,$lote)
        {
            $sentencia = $this->conexion->prepare("INSERT INTO inventario (Id,Nombre,Distribuidor,Cantidad,
            FechaDeCompra,FechaDeVencimiento,UsuarioId,Lote) VALUES (null,:nombre,:distribuidor,:cantidad,:fechadecompra,
            :fechadevencimiento,:usuarioId,:lote)");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":distribuidor",$distribuidor);
            $sentencia->bindParam(":cantidad",$cantidad);
            $sentencia->bindParam(":fechadecompra",$fechadecompra);
            $sentencia->bindParam(":fechadevencimiento",$fechadevencimiento);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":lote",$lote);
            $sentencia->execute();
        }

        public function Editar($id,$nombre,$distribuidor,$fechadecompra,$fechadevencimiento,$usuarioId,$lote)
        {
            $sentencia = $this->conexion->prepare("UPDATE inventario SET
            Nombre = :nombre, Distribuidor = :distribuidor, FechaDeCompra = :fechadecompra,
            FechaDeVencimiento = :fechadevencimiento, Lote = :lote, UsuarioId = :usuarioId WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":distribuidor",$distribuidor);
            $sentencia->bindParam(":fechadevencimiento",$fechadevencimiento);
            $sentencia->bindParam(":fechadecompra",$fechadecompra);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":lote",$lote);
            $sentencia->execute();
        }

        public function ListarInventario($usuarioId)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM inventario WHERE UsuarioId = :usuarioId");
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
            $listado_de_inventario = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $listado_de_inventario;
        }

        public function Eliminar($id)
        {
            $sentencia = $this->conexion->prepare("DELETE FROM inventario WHERE Id = :id");
            $sentencia-> bindParam(":id",$id);
            $sentencia->execute();
        }

        public function CambiarCantidad($id,$cantidad)
        {
            $sentencia = $this->conexion->prepare("UPDATE inventario SET Cantidad = :cantidad WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->bindParam(":cantidad",$cantidad);
            $sentencia->execute();
        }

        public function ObtenerInventario($id)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM inventario WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $objetoinvetario = $sentencia->fetch(PDO::FETCH_LAZY);
            return $objetoinvetario;
        }

        public function ValidarCrear($usuarioId,$lote)
        {
            $resultado = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM inventario WHERE
            Lote = :lote AND UsuarioId = :usuarioId");
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":lote",$lote);
            $sentencia->execute();
            $objetoinvetario = $sentencia->fetch(PDO::FETCH_LAZY);

            if($objetoinvetario != null)
            {
                $resultado = true;
            }

            return $resultado;
        }

        public function ValidarEditar($usuarioId,$lote,$id)
        {
            $resultado = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM inventario WHERE Lote = :lote
            AND UsuarioId = :usuarioId AND Id != :id");
            $sentencia->bindParam(":lote",$lote);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $objetoinvetario = $sentencia->fetch(PDO::FETCH_LAZY);

            if($objetoinvetario != null)
            {
                $resultado = true;
            }

            return $resultado;
        }
    }
?>
