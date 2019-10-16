<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
    //if(isset($_GET['token'])){
        require_once "../controladores/recuperarControlador.php";
        $insadmin = new recuperarControlador();
        
//        if(isset($_GET['token'])){
//            $volante=$_POST['radio'];
            $nombre=$_GET['usuario'];
            echo $insadmin->recuperar_contraseña($nombre);
//        }
    /*}else {
        session_start();
        session_unset();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'login/"</script>';*/
//}