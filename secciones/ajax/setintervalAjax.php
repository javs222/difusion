<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
    //if(isset($_GET['token'])){
        require_once "../controladores/setintervalControlador.php";
        $insadmin = new setintervalControlador();
        
//        if(isset($_GET['token'])){
//            $volante=$_POST['radio'];
//            $cuenta=$_GET['cuenta'];
            echo $insadmin->actualizar();
//        }
    /*}else {
        session_start();
        session_unset();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'login/"</script>';*/
//}