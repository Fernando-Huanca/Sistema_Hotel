<?php 
    class RegistroModel extends Query{
    
        public function __construct() {
            parent::__construct();
        }

        public function registrarse($nombre, $apellido, $usuario, $correo, $hash, $rol){
            $sql = "INSERT INTO usuarios (nombre, apellido, usuario, correo, clave, rol) VALUES (?,?,?,?,?,?)";
            return $this->insert($sql, [$nombre, $apellido, $usuario, $correo, $hash, $rol]);
        }

    }
?>