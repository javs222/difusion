<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "../modelos/setintervalModelo.php";
     }else {
         require_once "./modelos/setintervalModelo.php";
     }
class setintervalControlador extends setintervalModelo{
     public function actualizar(){
         //$codigo=$_GET['token'];
         return setintervalModelo::setinterval_modelo();

    }
}

