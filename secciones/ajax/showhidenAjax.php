<?php
    $peticionAjax=TRUE;
    require_once "../nucleo/configGeneral.php";
        require_once "../controladores/showhidenControlador.php";
        $insadmin = new showhidenControlador();
            $id=$_GET['id'];
            $tipo=$_GET['tipo'];
            echo $insadmin->mostrar_ocultar($id,$tipo);