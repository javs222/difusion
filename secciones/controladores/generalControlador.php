<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "./modelos/generalModelo.php";
     }else {
         require_once "../modelos/generalModelo.php";
     }
class generalControlador extends generalModelo{
     public function general(){
         //$codigo=$_GET['token'];
         return generalModelo::general_busqueda();

    }
}

