<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "./modelos/vistageneralModelo.php";
     }else {
         require_once "../modelos/vistageneralModelo.php";
     }
class vistageneralControlador extends vistageneralModelo{
     public function vista_general_controlador($id,$tipo){
         return vistageneralModelo::vista_general_modelo($id,$tipo);
    }
}

