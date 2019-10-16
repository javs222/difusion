<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
    //if(isset($_GET['token'])){
        require_once "../controladores/desactivarControlador.php";
        $insadmin = new desactivarControlador();
        
//        if(isset($_GET['token'])){
//            $volante=$_POST['radio'];
            $nomtitulo=$_GET['titulo'];
            $idtiposeccion=$_GET['idtisecc'];
            echo $insadmin->desactivar_titulo($nomtitulo,$idtiposeccion);
//        }
    /*}else {
        session_start();
        session_unset();
        session_destroy();
        echo '<script> window.location.href="'.SERVERURL.'login/"</script>';*/
//}