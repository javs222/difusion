<?php
if($peticionAjax){
         require_once "../modelos/eliminarModelo.php";
     }else {
         require_once "./modelos/eliminarModelo.php";
     }
class eliminarControlador extends eliminarModelo{
     public function eliminar_cuenta($cuenta){
         //$codigo=$_GET['token'];
//         return httpushModelo::httpush_modelo();
         return eliminarModelo::eliminar_cuenta_modelo($cuenta);

    }
}

