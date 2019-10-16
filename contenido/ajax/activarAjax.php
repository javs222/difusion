<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
    //if(isset($_GET['token'])){
        require_once "../controladores/activarControlador.php";
        $insadmin = new activarControlador();
        
//        if(isset($_GET['token'])){
//            $volante=$_POST['radio'];
            $nomtitulo=$_GET['titulo'];
            $idtiposeccion=$_GET['idtisecc'];
            echo $insadmin->activar_titulo($nomtitulo,$idtiposeccion);
//        }
    /*}else {
        session_start();
        session_unset();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'login/"</script>';*/
//}