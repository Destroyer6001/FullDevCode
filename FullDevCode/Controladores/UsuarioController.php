<?php 

    class UsuarioController{

        private $servicio;

        public function __construct()
        {
            require_once("c://xampp/htdocs/FullDevCode/Servicios/ServicioUsuarios.php");
            $this->servicio = new ServicioUsuarios();
        }

        public function InicioDeSesion($nit,$password)
        {
            $resultado = $this->servicio->Login($nit,$password);
            return $resultado; 
        } 

        public function RegistroUsuario($nombre, $direccion, $municipio, $departamento, $nit, $password, $propietario)
        {
            $retornoid = $this->servicio->RegistrarUsuario($nombre,$direccion,$municipio,$departamento,$nit,$password,$propietario);
            return $retornoid;
        }

        public function Editar ($id, $nombre, $direccion, $municipio, $departamento, $nit, $password, $propietario)
        {
            $this->servicio->EditarUsuario($id, $nombre, $direccion, $municipio, $departamento, $nit, $password, $propietario);
        }

        public function ValidarCrear($nit)
        {
            $resultado = $this->servicio->ExisteCrear($nit);
            return $resultado;
        }

        public function ValidarEditar($id,$nit)
        {
            $resultado = $this->servicio->ExisteEditar($id,$nit);
            return $resultado; 
        }

        public function ConsultarUsuario($id)
        {
            $resultado = $this->servicio->ObtenerUsuario($id);
            return $resultado;
        }


    }


?>