<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "./modelos/tipoModelo.php";
     }else {
         require_once "../modelos/tipoModelo.php";
     }
class tipoControlador extends tipoModelo{
     public function obtener_tipo(){
         //$codigo=$_GET['token'];
         return tipoModelo::tipo_modelo();

    }
}

