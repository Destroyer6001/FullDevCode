<?php

    class ServicioCultivos{

        private $conexion;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/bd.php");
            $con = new BaseDeDatos();
            $this->conexion = $con->Conexion();
        }

        public function Crear($nombre, $usuarioId)
        {
            $sentencia = $this->conexion->prepare("INSERT INTO cultivo(Id,Nombre,UsuarioId) 
            VALUES (null,:nombre,:usuarioid)");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioid",$usuarioId);
            $sentencia->execute();
        }

        public function Listar($usuarioId)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM cultivo WHERE UsuarioId = :usuarioId");
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
            $listado_cultivos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $listado_cultivos;
        }

        public function Editar($id, $nombre, $usuarioId)
        {
            $sentencia = $this->conexion->prepare("UPDATE cultivo SET Nombre = :nombre, 
            UsuarioId = :usuarioId WHERE Id = :id");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
        }

        public function ObtenerCultivo($id)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM cultivo WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $cultivo = $sentencia->fetch(PDO::FETCH_LAZY);
            return $cultivo;
        }

        public function Eliminar($id)
        {
            $sentencia = $this->conexion->prepare("DELETE FROM cultivo WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
        }

        public function ValidarCrear($nombre, $usuarioId)
        {
            $validacion = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM cultivo WHERE Nombre = :nombre
            AND UsuarioId = :usuarioid");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioid",$usuarioId);
            $sentencia->execute();
            $cultivo = $sentencia->fetch(PDO::FETCH_LAZY);

            if($cultivo != null)
            {
                $validacion = true;
            }

            return $validacion;
        }

        public function ValidarEditar($nombre,$usuarioId,$id)
        {
            $validacion = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM cultivo WHERE Nombre = :nombre AND 
            UsuarioId = :usuarioId AND Id != :id");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $cultivo = $sentencia->fetch(PDO::FETCH_LAZY);

            if($cultivo != null)
            {
                $validacion = true;
            }

            return $validacion;
        }

    }


?>