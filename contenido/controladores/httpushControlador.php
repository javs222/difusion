<?php
if($peticionAjax){
         require_once "../modelos/httpushModelo.php";
     }else {
         require_once "./modelos/httpushModelo.php";
     }
class httpushControlador extends httpushModelo{
     public function actualizar_httpush($codigo){
         //$codigo=$_GET['token'];
//         return httpushModelo::httpush_modelo();
         return httpushModelo::seleccionar($codigo);

    }
}

