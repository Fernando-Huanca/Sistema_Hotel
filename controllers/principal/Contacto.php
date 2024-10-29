<?php 
class Contacto extends Controller{
public function __construct() {
   parent::__construct();
}

   public function index(){
      $data['title'] = 'Contactos';
      $data['subtitle'] = 'Contactenos';
      $this->views->getView('principal/contactos/index', $data);
   }   
}
?>