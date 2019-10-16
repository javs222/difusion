<?php
        $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
//    if(isset($_GET['id'])){
        require_once "../controladores/edicionseccionesControlador.php";
        $logout= new edicionseccionesControlador();
        echo   $logout->edicion_secciones();
//    }else {
//        session_start();
//        session_unset();
//        session_destroy();
//        echo '<script>window.location.href="'.SERVERURL.'login/"</script>';
//}