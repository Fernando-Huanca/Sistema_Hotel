<?php
require_once 'vendor/autoload.php';
class Reserva extends Controller
{
   public function __construct()
   {
      parent::__construct();
      session_start();
   }

   public function verify()
   {
      if (isset($_GET['f_llegada']) && isset($_GET['f_salida']) && isset($_GET['habitacion'])) {
         $f_llegada = strClean($_GET['f_llegada']);
         $f_salida = strClean($_GET['f_salida']);
         $habitacion = strClean($_GET['habitacion']);
         if (empty($f_llegada) || empty($f_salida) || empty($habitacion)) {
            header('Location: ' . RUTA_PRINCIPAL . '?respuesta=warning');
         } else {
            $reserva = $this->model->getDisponible($f_llegada, $f_salida, $habitacion);
            $data['title'] = 'Reservas';
            $data['subtitle'] = 'Verificar Disponibilidad';
            $data['disponible'] = [
               'f_llegada' => $f_llegada,
               'f_salida' => $f_salida,
               'habitacion' => $habitacion
            ];
            if (empty($reserva)) {
               //CREAR SESION DE LA HABITACIÓN
               $_SESSION['reserva'] = $data['disponible'];
               $data['mensaje'] = 'DISPONIBLE';
               $data['tipo'] = 'success';
            } else {
               $data['mensaje'] = 'NO DISPONIBLE';
               $data['tipo'] = 'danger';
            }
            $data['habitaciones'] = $this->model->getHabitaciones();
            $data['habitacion'] = $this->model->getHabitacion($habitacion);
            $this->views->getView('principal/reservas', $data);
         }
      }
   }

   public function listar($parametros)
   {
      $array = explode(',', $parametros);
      $f_llegada = (!empty($array[0])) ? $array[0] : null;
      $f_salida = (!empty($array[1])) ? $array[1] : null;
      $habitacion = (!empty($array[2])) ? $array[2] : null;
      $results = [];
      if ($f_llegada != null && $f_salida != null && $habitacion != null) {
         $reservas = $this->model->getReservasHabitacion($habitacion);
         print_r($reservas);
         exit;
         for ($i = 0; $i < count($reservas); $i++) {
            $datos['id'] = $reservas[$i]['id'];
            $datos['title'] = 'OCUPADO';
            $datos['start'] = $reservas[$i]['fecha_ingreso'];
            $datos['end'] = $reservas[$i]['fecha_salida'];
            $datos['color'] = '#dc3545';
            array_push($results, $datos);
         }
         $data['id'] = $habitacion;
         $data['title'] = 'COMPROBANDO';
         $data['start'] = $f_llegada;
         $data['end'] = $f_salida;
         $data['color'] = '#ffc107';
         array_push($results, $data);
         echo json_encode($results, JSON_UNESCAPED_UNICODE);
      }
      die();
   }

   public function pendiente(){
      $data['title'] = 'Reserva pendiente';
      $data['habitacion'] = [];
      if(!empty($_SESSION['reserva'])){
         $data['habitacion'] = $this->model->getHabitacion($_SESSION['reserva']['habitacion']);
      }
      $this->views->getView('principal/clientes/reservas/pendiente', $data);
   }
}
?>
