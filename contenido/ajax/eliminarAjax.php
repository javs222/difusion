<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
    //if(isset($_GET['token'])){
        require_once "../controladores/eliminarControlador.php";
        $insadmin = new eliminarControlador();
        
//        if(isset($_GET['token'])){
//            $volante=$_POST['radio'];
//            $nomtitulo=$_GET['titulo'];
            $cuenta=  mainModel::decryption($_GET['cuenta']);
            echo $insadmin->eliminar_cuenta($cuenta);
//        }
    /*}else {
        session_start();
        session_unset();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'login/"</script>';*/
//}