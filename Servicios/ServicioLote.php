<?php

    class ServicioLote
    {
        private $conexion;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/bd.php");
            $con = new BaseDeDatos();
            $this->conexion = $con->Conexion();
        }

        public function Crear($nombre,$usuarioId,$cultivoId,$tamano)
        {
            $sentencia = $this->conexion->prepare("INSERT INTO lotes(Id,UsuarioId,CultivoId,Nombre,Tamano) 
            VALUES (null,:usuarioId,:cultivoId,:nombre,:tamano)");
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":cultivoId",$cultivoId);
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":tamano",$tamano);
            $sentencia->execute();
        }

        public function Actualizar($id,$nombre,$usuarioId,$cultivoId,$tamano)
        {
            $sentencia = $this->conexion->prepare("UPDATE lotes SET Nombre = :nombre, UsuarioId = :usuarioId,
            CultivoId = :cultivoId, Tamano = :tamano WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":cultivoId",$cultivoId);
            $sentencia->bindParam(":tamano",$tamano);
            $sentencia->execute();
        }

        public function Listar($usuarioId)
        {
            $sentencia = $this->conexion->prepare("SELECT *,
            (SELECT Nombre
            FROM cultivo
            WHERE cultivo.id = lotes.CultivoId limit 1) as nombrecultivo
            FROM lotes WHERE UsuarioId = :usuarioId");
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->execute();
            $listado_lotes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $listado_lotes;
        }

        public function Obtener($id)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM lotes WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $Lote = $sentencia->fetch(PDO::FETCH_LAZY);
            return $Lote;
        }

        public function Borrar($id)
        {
            $sentencia = $this->conexion->prepare("DELETE FROM lotes WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
        }

        public function ExisteCrear($usuarioId, $nombre)
        {
            $validacion = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM lotes WHERE UsuarioId = :usuarioId
            AND Nombre = :nombre");
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->execute();
            $Lote = $sentencia->fetch(PDO::FETCH_LAZY);

            if($Lote != null)
            {
                $validacion = true;
            }

            return $validacion;
        }

        public function ExisteEditar($nombre,$usuarioId,$id)
        {
            $validacion = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM lotes WHERE UsuarioId = :usuarioId AND
            Nombre = :nombre AND Id != :id");
            $sentencia->bindParam(":usuarioId",$usuarioId);
            $sentencia->bindParam(":nombre", $nombre);
            $sentencia->bindParam(":id", $id);
            $sentencia->execute();
            $Lote = $sentencia->fetch(PDO::FETCH_LAZY);

            if($Lote != null)
            {
                $validacion = true;
            }

            return $validacion;

        }
    }



?>