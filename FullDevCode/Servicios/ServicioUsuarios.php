<?php 

    class ServicioUsuarios
    {
        private $conexion;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/bd.php");
            $con = new BaseDeDatos();
            $this->conexion = $con->Conexion();
        }


        public function RegistrarUsuario($nombre, $direccion, $municipio, $departamento, $nit, $password, $propietario)
        {
            $sentencia = $this->conexion-> prepare("INSERT INTO usuarios(Id,Nombre,Direccion,Municipio,Departamento,Nit,Propietario,Password) VALUES 
            (Null,:nombre,:direccion,:municipio,:departamento,:nit,:propietario,:password)");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":direccion",$direccion);
            $sentencia->bindParam(":municipio",$municipio);
            $sentencia->bindParam(":departamento",$departamento);
            $sentencia->bindParam(":nit",$nit);
            $sentencia->bindParam(":propietario",$propietario);
            $sentencia->bindParam(":password",$password);
            return ($sentencia->execute()) ? $this->conexion->lastInsertId() : false;

        }

        public function EditarUsuario($id, $nombre, $direccion, $municipio, $departamento, $nit, $password, $propietario)
        {
            $sentencia = $this->conexion->prepare("UPDATE usuarios SET Nombre = :nombre,Direccion = :direccion,Municipio = :municipio,Departamento = :departamento,
            Nit = :nit,Propietario = :propietario, Password = :password WHERE Id = :id");
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":direccion",$direccion);
            $sentencia->bindParam(":municipio",$municipio);
            $sentencia->bindParam(":departamento",$departamento);
            $sentencia->bindParam(":nit",$nit);
            $sentencia->bindParam(":propietario",$propietario);
            $sentencia->bindParam(":password",$password);
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
        }

        public function Login ($nit,$password)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM usuarios WHERE Nit = :nit AND Password = :password");
            $sentencia->bindParam(":nit",$nit);
            $sentencia->bindParam(":password",$password);
            $sentencia->execute();
            $usuario = $sentencia->fetch(PDO::FETCH_LAZY);  
            return $usuario; 
        }

        public function ExisteCrear($nit)
        {
            $validacion = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM usuarios WHERE Nit = :nit");
            $sentencia->bindParam(":nit",$nit);
            $sentencia->execute();
            $usuario = $sentencia->fetch(PDO::FETCH_LAZY);
            
            if($usuario != null)
            {
                $validacion = true;
            }

            return $validacion;
        }

        public function ExisteEditar($id, $nit)
        {
            $validacion = false;
            $sentencia = $this->conexion->prepare("SELECT * FROM usuarios WHERE Id != :id AND Nit = :nit");
            $sentencia->bindParam(":nit",$nit);
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $usuario = $sentencia->fetch(PDO::FETCH_LAZY);

            if($usuario != null)
            {
                $validacion = true;
            }

            return $validacion; 

        }

        public function ObtenerUsuario($id)
        {
            $sentencia = $this->conexion->prepare("SELECT * FROM usuarios WHERE Id = :id");
            $sentencia->bindParam(":id",$id);
            $sentencia->execute();
            $resultadoconsulta = $sentencia->fetch(PDO::FETCH_LAZY);
            return $resultadoconsulta;
        }
    }



?>