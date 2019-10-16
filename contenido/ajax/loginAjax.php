<?php
        $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
    if(isset($_GET['token'])){
        require_once "../controladores/logincontrolador.php";
        $logout= new loginControlador();
        echo   $logout->cerrar_sesion_controlador();
    }else {
        session_start();
        session_unset();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
}