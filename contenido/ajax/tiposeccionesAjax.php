<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
//    if(isset($_POST['seccion']) && isset($_POST['tipo_seccion']) && isset($_POST['prioridad'])){
        require_once "../controladores/seccionesControlador.php";
        $insadmin = new seccionesControlador();
        
//        if(isset($_POST['seccion']) && isset($_POST['tipo_seccion']) && isset($_POST['prioridad']) && isset($_POST['textolink']) && isset($_POST['pdfimg'])){
            echo $insadmin->agregar_tiposecciones_controlador();
//        }
//    }else {
//        session_start();
//        session_unset();
//        session_destroy();
//        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
//}