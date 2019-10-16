<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
    //if(isset($_GET['token'])){
        require_once "../controladores/httpushControlador.php";
        $insadmin = new httpushControlador();
        
//        if(isset($_GET['token'])){
//            $volante=$_POST['radio'];
//            $cuenta=$_GET['cuenta'];
            echo $insadmin->actualizar_httpush();
//        }
    /*}else {
        session_start();
        session_unset();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'login/"</script>';*/
//}