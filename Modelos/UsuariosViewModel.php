<?php 
    class Usuario
    {
        private $id; 
        private $nombre;
        private $direccion; 
        private $departamento;
        private $municipio;
        private $nit;
        private $password;
        private $propietario;

        public function __construct($id,$nombre,$direccion,$departamento,$municipio,$nit,$password,$propietario){
            
            $this->id = $id;
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->departamento = $departamento;
            $this->municipio = $municipio;
            $this->nit = $nit;
            $this->password = $password;
            $this->propietario = $propietario;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getDireccion()
        {
            return $this->direccion;
        }

        public function getDepartamento()
        {
            return $this->departamento;
        }

        public function getMunicipio()
        {
            return $this->municipio;
        }

        public function getNit()
        {
            return $this->nit;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getPropietario()
        {
            return $this->propietario;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;
        }

        public function setMunicipio($municipio)
        {
            $this->municipio = $municipio;
        }

        public function setDepartamento($departamento)
        {
            $this->departamento = $departamento;
        }

        public function setNit($nit)
        {
            $this->nit = $nit;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function setPropietario($propietario)
        {
            $this->propietario = $propietario;
        }


    }


?>