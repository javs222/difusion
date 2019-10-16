<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
//    if(isset($_POST['contrasenia'])){
        require_once "../controladores/contraseniaControlador.php";
        $insadmin = new contraseniaControlador();
        
//        if(isset($_POST['contrasenia']) && isset($_POST['contrasenia2']) && isset($_POST['actual'])){
            echo $insadmin->actualizar_contrasenia_controlador();
//        }
//    }else {
//        session_start();
//        session_destroy();
//        echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
//}