<?php

    class ServicioLabor{
        private $conexion;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/bd.php");
            $con = new BaseDeDatos();
            $this->conexion = $con->Conexion();
        }

        public function Crear($nombre,$usuarioId)
        {
            $sentencia = $this->conexion->prepare("INSERT INTO labor (Id,Nombre,UsuarioId) VALUES (null,:nombre,:usuarioId)");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
        }

        public function Editar($nombre, $id, $usuarioId)
        {
            $sentencia = $this->conexion->prepare("UPDATE labor SET Nombre = :nombre, UsuarioId = :usuarioId WHERE Id = :id");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
        }

        public function Borrar($id)
        {
            $sentencia = $this->conexion->prepare("DELETE FROM labor WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
        }

        public function Listar($usuarioId)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM labor WHERE UsuarioId = :usuarioId");
            $sentencia->bindParam(":usuarioId", $usuarioId);
            $sentencia->execute();
            $listado_labores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $listado_labores;
        }

        public function ExisteCrear($nombre, $usuarioId)
        {
            $validacion = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM labor WHERE Nombre = :nombre AND UsuarioId = :usuarioId");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
            $labor = $sentencia->fetch(PDO::FETCH_LAZY);
            if($labor != null)
            {
                $validacion = true;
            }
            return $validacion;
        }

        public function ExisteEditar($id,$nombre,$usuarioId)
        {
            $validacion = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM labor WHERE
            Nombre = :nombre AND UsuarioId = :usuarioId AND Id != :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
            $labor = $sentencia->fetch(PDO::FETCH_LAZY);
            if($labor != null)
            {
                $validacion = true;
            }
            return $validacion;
        }

        public function ObtenerLabor($id)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM labor WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $labor = $sentencia->fetch(PDO::FETCH_LAZY);
            return $labor;
        }

    }


?>
