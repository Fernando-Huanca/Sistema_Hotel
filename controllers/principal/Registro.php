<?php
class Registro extends Controller
{
   public function __construct()
   {
      parent::__construct();
   }

   public function index()
   {
    $data['title'] = 'Registro';
    $data['subtitle'] = 'Registrarse';
    $this->views->getView('principal/registro', $data);
   }

   public function crear(){
      $nombre = strClean($_POST['nombre']);
      $apellido = strClean($_POST['apellido']);
      $usuario = strClean($_POST['usuario']);
      $correo = strClean($_POST['correo']);
      $clave = strClean($_POST['clave']);
      $confirmar = strClean($_POST['confirmar']);
      $hash = password_hash($clave, PASSWORD_DEFAULT);
      $rol = 2;
      $this->model->registrarse($nombre, $apellido, $usuario, $correo, $hash, $rol);
   }
}

