<?php
class Login extends Controller
{
   public function __construct()
   {
      parent::__construct();
   }

   public function index()
   {
      $data['title'] = 'Login';
      $data['subtitle'] = 'Inicio de sesion';
      $this->views->getView('principal/login', $data);
   }

   public function verify()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         if (validarCampos(['usuario', 'clave'])) {
            $usuario = strClean($_POST['usuario']);
            $clave = strClean($_POST['clave']);
            //VERIFICAR ACCESO
            $verificar = $this->model->validarAcceso($usuario);
            if (empty($verificar)) {
               $res = ['tipo' => 'warning', 'msg' => 'EL USUARIO NO EXISTE'];
            } else {
               if (password_verify($clave, $verificar['clave'])) {
                  //CREAR SESIONES
                  $res = ['tipo' => 'success', 'msg' => 'BIENVENIDO'];
               } else {
                  $res = ['tipo' => 'warning', 'msg' => 'CONTRASEÑA INCORRECTA'];
               }
               
            }
            
         } else {
            $res = ['tipo' => 'warning', 'msg' => 'TODOS LOS CAMPOS CON * SON REQUERIDOS ****'];
         }
         echo json_encode($res, JSON_UNESCAPED_UNICODE);
         die();
      }
   }
}
