<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
//    if(isset($_POST['nom_usuario'])){
        require_once "../controladores/administradorControlador.php";
        $insadmin = new adminstradorControlador();
        
//        if(isset($_POST['nom_usuario']) && isset($_POST['contrasenia'])){
            echo $insadmin->agregar_administrador_controlador();
//        }
//    }else {
//        session_start();
//        session_destroy();
//        echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
//}