<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "./modelos/contadortituloModelo.php";
     }else {
         require_once "../modelos/contadortitloModelo.php";
     }
class contadortituloControlador extends contadortituloModelo{
     public function obtener_contador_titulo(){
         //$codigo=$_GET['token'];
         return contadortituloModelo::contador_titulo_modelo();

    }
}

