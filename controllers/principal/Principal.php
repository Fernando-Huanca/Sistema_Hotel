<?php 
class Principal extends Controller{
public function __construct() {
   parent::__construct();
}

   public function index(){
      $data['title'] = 'Página principal';
      //TRAER SLIDERS
      $data['sliders'] = $this->model->getSliders();
      $this->views->getView('index', $data);
   }   
}
?>