<?php
if($peticionAjax){
         require_once "../modelos/recuperarModelo.php";
     }else {
         require_once "./modelos/recuperarModelo.php";
     }
class recuperarControlador extends recuperarModelo{
     public function recuperar_contraseña($nombre){
         //$codigo=$_GET['token'];
//         return httpushModelo::httpush_modelo();
         return recuperarModelo::recuperar_contraseña_modelo($nombre);

    }
}

