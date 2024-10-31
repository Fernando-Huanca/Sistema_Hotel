<?php 
class Principal extends Controller{
public function __construct() {
   parent::__construct();
}

   public function index(){
      $data['title'] = 'Página principal';
      //TRAER SLIDERS
      $data['sliders'] = $this->model->getSliders();
      //TRAER HABITACIONES
      $data['habitaciones'] = $this->model->getHabitaciones();

      
      $this->views->getView('index', $data);
   }  
   
   public function verify(){
      if (isset($_GET['f_llegada'])&&isset($_GET['f_salida'])&&isset($_GET['habitacion'])) {
         $f_llegada = strClean($_GET['f_llegada']);
         $f_salida = strClean($_GET['f_salida']);
         $habitacion = strClean($_GET['habitacion']);
         if (empty($f_llegada)||empty($f_salida)||empty($habitacion)) {
            header('Location: ' . RUTA_PRINCIPAL . '?respuesta=warning');
         } else {
            $data = $this->model->getDisponible($f_llegada, $f_salida, $habitacion);
             print_r($data);
         } 
      }  
   }
}
?>