<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "./modelos/contadorModelo.php";
     }else {
         require_once "../modelos/contadorModelo.php";
     }
class contadorControlador extends contadorModelo{
     public function obtener_contador(){
         //$codigo=$_GET['token'];
         return contadorModelo::contador_modelo();

    }
}

