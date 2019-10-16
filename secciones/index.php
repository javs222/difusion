<?php
    require_once "nucleo/configGeneral.php";
//     include "vistas/plantilla.php";
     require_once './controladores/vistasControlador.php';
    $plantilla = new vistasControlador();
    $plantilla->obtener_plantilla_controlador();
