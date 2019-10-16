<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "./modelos/sacmexModelo.php";
     }else {
         require_once "../modelos/sacmexModelo.php";
     }
class sacmexControlador extends sacmexModelo{
     public function sacmex(){
         //$codigo=$_GET['token'];
         return sacmexModelo::sacmex_busqueda();

    }
}

