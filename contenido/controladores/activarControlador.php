<?php
if($peticionAjax){
         require_once "../modelos/activarModelo.php";
     }else {
         require_once "./modelos/activarModelo.php";
     }
class activarControlador extends activarModelo{
     public function activar_titulo($nomtitulo,$idtiposeccion){
         //$codigo=$_GET['token'];
//         return httpushModelo::httpush_modelo();
         return activarModelo::activar_modelo($nomtitulo,$idtiposeccion);

    }
}

