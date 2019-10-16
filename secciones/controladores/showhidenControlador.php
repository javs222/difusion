<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "../modelos/showhidenModelo.php";
     }else {
         require_once "./modelos/showhidenModelo.php";
     }
class showhidenControlador extends showhidenModelo{
     public function mostrar_ocultar($id,$tipo){
         //$codigo=$_GET['token'];
         return showhidenModelo::mostrar_ocular_modelo($id,$tipo);

    }
}

