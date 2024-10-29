<?php 
class Blog extends Controller{
public function __construct() {
   parent::__construct();
}

   public function index(){
      $data['title'] = 'Habitaciones';
      $this->views->getView('principal/blog/index', $data);
   }   
}
?>