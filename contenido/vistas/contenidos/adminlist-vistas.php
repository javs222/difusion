<?php
    if($_SESSION['tipo_sdo']=="administrador"):
//        echo $lc->forzar_cierre_sesion_controlador();
?>
<!--<div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Listado <small> de Usuarios</small></h1>
        </div>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
</div>-->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw mdc-text-green"></i> Listado <small> de Usuarios</small></h1>
    </div>    
</div>
<?php 
    require_once "./controladores/administradorControlador.php";
    $insAdmin= new adminstradorControlador();
?>
<!--<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
                <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                    <li>
                        <a href="<?ph echo SERVERURL; ?>admin/" class="btn btn-info text-center"><i class="zmdi zmdi-accounts-add zmdi-hc-lg"></i>&nbsp; Ingreso Nuevo</a>
                    </li>
                    <li>
                        <a href="<?ph echo SERVERURL; ?>adminlist/" class="btn btn-success text-center"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-lg"></i>&nbsp; Listado de usuarios</a>
                    </li>
                </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <?ph
                                    $pagina= explode("/",$_GET['vistas']);
                                    echo $insAdmin->paginador_adminlist_controlador($pagina[1],10)//,$_SESSION['cdcuenta_ssc']
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="container-fluid">
    <ul class="breadcrumb" style="margin-bottom: 15px;">
        <li>
            <a href="<?php echo SERVERURL; ?>admin/" class="btn btn-info text-center"><i class="zmdi zmdi-accounts-add zmdi-hc-lg"></i>&nbsp; Ingreso Nuevo</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>adminlist/" class="btn btn-success text-center"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-lg"></i>&nbsp; Listado de usuarios</a>
        </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="new">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <?php
                            $pagina= explode("/",$_GET['vistas']);
                            echo $insAdmin->paginador_adminlist_controlador($pagina[1],10)//,$_SESSION['cdcuenta_ssc']
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
else:
?>
    <div class="full-width panel-content">
        <h4 class="text-center">Lo siento, no se puede mostrar la información</h4>
        <p class="text-center" style="color: red;">¡No Tienes Permisos de Administrador!</p>
    </div>
<?php endif;?>