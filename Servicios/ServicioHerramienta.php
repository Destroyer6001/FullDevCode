<?php

    class ServicioHerramienta{
        private $conexion;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/bd.php");
            $con = new BaseDeDatos();
            $this->conexion = $con->Conexion();
        }

        public function Crear($nombre,$fabricante,$cantidad,$fechadecompra,$usuarioId)
        {
            $sentencia = $this->conexion->prepare("INSERT INTO herramientas
            (Id,Nombre,Fabricante,Cantidad,FechaDeCompra,UsuarioId) VALUES
            (null,:nombre,:fabricante,:cantidad,:fechadecompra,:usuarioId)");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":fabricante",$fabricante);
            $sentencia->bindParam(":cantidad",$cantidad);
            $sentencia->bindParam(":fechadecompra",$fechadecompra);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
        }

        public function Editar($id,$nombre,$fabricante,$cantidad,$fechadecompra,$usuarioId)
        {
            $sentencia = $this->conexion->prepare("UPDATE herramientas SET
            Nombre = :nombre, Fabricante = :fabricante, Cantidad = :cantidad, FechaDeCompra = :fechadecompra,
            UsuarioId = :usuarioId WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":fabricante",$fabricante);
            $sentencia->bindParam(":cantidad",$cantidad);
            $sentencia->bindParam(":fechadecompra",$fechadecompra);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
        }

        public function Borrar($id)
        {
            $sentencia = $this->conexion->prepare("DELETE FROM herramientas WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
        }

        public function Listar($usuarioId)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM herramientas WHERE UsuarioId = :usuarioId");
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
            $listadeherramientas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $listadeherramientas;
        }

        public function Obtener($id)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM herramientas WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $herramienta = $sentencia->fetch(PDO::FETCH_LAZY);
            return $herramienta;
        }

        public function ValidarCrear($nombre,$usuarioId,$fabricante)
        {
            $resultado = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM herramientas WHERE
            Nombre = :nombre AND Fabricante = :fabricante AND UsuarioId = :usuarioId");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":fabricante",$fabricante);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
            $herramienta = $sentencia->fetch(PDO::FETCH_LAZY);
            if($herramienta != null)
            {
                $resultado = true;
            }
            return $resultado;
        }

        public function ValidarEditar($nombre,$usuarioId,$fabricante,$id)
        {
            $resultado = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM herramientas WHERE
            Nombre = :nombre AND Fabricante = :fabricante AND UsuarioId = :usuarioId AND Id != :id");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":fabricante",$fabricante);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $herramienta = $sentencia->fetch(PDO::FETCH_LAZY);
            if($herramienta != null)
            {
                $resultado = true;
            }
            return $resultado;
        }

    }




?>
