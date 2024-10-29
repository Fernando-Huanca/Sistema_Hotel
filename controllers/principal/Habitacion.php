<?php 
class Habitacion extends Controller{
public function __construct() {
   parent::__construct();
}

   public function index(){
      $data['title'] = 'Habitaciones';
      $this->views->getView('principal/habitacion/index', $data);
   }   
}
?>