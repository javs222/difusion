<?php
$peticionAjax=TRUE;
if($peticionAjax){
         require_once "./modelos/todoModelo.php";
     }else {
         require_once "../modelos/todoModelo.php";
     }
class todoControlador extends todoModelo{
     public function obtener_todo(){
         //$codigo=$_GET['token'];
         return todoModelo::todo_modelo();

    }
}

