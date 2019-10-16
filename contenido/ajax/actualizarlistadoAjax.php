<?php
//    $codigo=$_GET['variable'];
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
//    if(isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])){
        require_once "../controladores/actualizarlistadoControlador.php";
        $insadmin = new actualizarlistadoControlador();
        
//        if(isset($_POST['seccion']) && isset($_POST['tipo_seccion']) && isset($_POST['prioridad']) && isset($_POST['textolink']) && isset($_POST['pdfimg'])){
            echo $insadmin->actualizar_listado_controlador();
//        }
//    }else {
//        session_start();
//        session_unset();
//        session_destroy();
//        echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
//}