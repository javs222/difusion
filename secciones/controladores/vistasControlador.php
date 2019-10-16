<?php
require_once './modelos/vistasModelos.php';
 class vistasControlador extends vistasModelo{
     public function obtener_plantilla_controlador(){
         return require_once './vistas/plantilla.php';
     }
     public function obtener_vistas_controlador(){
         if(isset($_GET['vistas'])){
             $ruta = explode("/", $_GET['vistas']);
             $respuesta = vistasModelo::obtener_vistas_modelo($ruta[0]);//self, referencia a clases heredadas, con los :: le decimos que queremos acceder a la funcion
         }else{
             $respuesta = "login";
         }
         return $respuesta;
     }
 }