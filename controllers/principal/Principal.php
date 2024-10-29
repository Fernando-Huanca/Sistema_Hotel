<?php 
class Principal extends Controller{
public function __construct() {
   parent::__construct();
}

   public function index(){
      $data['title'] = 'Página principal';
      $this->views->getView('index', $data);
   }   
}
?>