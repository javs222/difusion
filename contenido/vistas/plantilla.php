<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="icon" type="image/png" href="<?php echo SERVERURL; ?>vistas/assets/img/dc2.jpg" />
        <link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/main.css">
        <link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/busqueda.css">
        <link href="<?php echo SERVERURL; ?>vistas/css/error.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SERVERURL; ?>vistas/css/material-design-color-palette.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SERVERURL; ?>vistas/css/material-design-color-palette.min.css" rel="stylesheet" type="text/css"/>       
        <link href="<?php echo SERVERURL; ?>vistas/css/material-design-iconic-font.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SERVERURL; ?>vistas/css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SERVERURL; ?>vistas/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo SERVERURL; ?>vistas/css/header.css" rel="stylesheet" type="text/css"/>
        <!--<link href="<?ph echo SERVERURL; ?>vistas/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <script src="<?php echo SERVERURL; ?>vistas/js/validarRegistro.js" type="text/javascript"></script>
        <script src="<?php echo SERVERURL; ?>vistas/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo SERVERURL; ?>vistas/js/sweetalert2.min.js"></script>
        <script src="<?php echo SERVERURL; ?>vistas/js/bootstrap.min.js"></script>
        <script src="<?php echo SERVERURL; ?>vistas/js/material.min.js"></script>
        <script src="<?php echo SERVERURL; ?>vistas/js/ripples.min.js"></script>
        <script src="<?php echo SERVERURL; ?>vistas/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?php echo SERVERURL; ?>vistas/js/main.js"></script>
<!--        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
</head>
<body>
        <?php 
               $peticionAjax=FALSE;
            require_once "./controladores/vistasControlador.php"; 
            $vt = new vistasControlador();
            $vistasR = $vt->obtener_vistas_controlador();
            if($vistasR=="login" || $vistasR=="404"):
                if($vistasR=="login"){
                    require_once "./vistas/contenidos/login-vistas.php";
                }else{
                    require_once "./vistas/contenidos/404-vistas.php";
                }
            else:
                session_start(['name'=>'SDO']);
                require_once "./controladores/logincontrolador.php";
                
                $lc= new loginControlador();
                if(!isset($_SESSION['token_sdo']) || !isset($_SESSION['usuario_sdo'])){
                    $lc->forzar_cierre_sesion_controlador();
                }
        ?>
	<!-- SideBar -->
	<?php include "vistas/modulos/navlateral.php"; ?>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<?php include "vistas/modulos/navbar.php"; ?>
		<!-- Content page -->
		<?php require_once $vistasR; ?>
	</section>
        <?php 
        require_once "./vistas/modulos/buscar.php";
        require_once "./vistas/modulos/logoutScript.php";
        endif; 
        ?>
        <script>
        $.material.init();
        </script>
</body>
</html>