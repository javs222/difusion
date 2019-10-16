<?php
if($peticionAjax){
         require_once "../modelos/desactivarModelo.php";
     }else {
         require_once "./modelos/desactivarModelo.php";
     }
class desactivarControlador extends desactivarModelo{
     public function desactivar_titulo($nomtitulo,$idtiposeccion){
         //$codigo=$_GET['token'];
//         return httpushModelo::httpush_modelo();
         return desactivarModelo::desactivar_modelo($nomtitulo,$idtiposeccion);

    }
}

