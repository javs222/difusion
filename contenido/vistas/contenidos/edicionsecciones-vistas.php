<?php
//    if($_SESSION['tipo_sdo']!="administrador"){
//        echo $lc->forzar_cierre_sesion_controlador();
//    }
?>
<div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles"><i class="zmdi zmdi-view-day zmdi-hc-fw mdc-text-green"></i> Listado <small> de secciones</small></h1>
        </div>
        <!--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>-->
</div>
<?php 
    require_once "./controladores/administradorControlador.php";
    $insAdmin= new adminstradorControlador();
?>
<div class="container-fluid">
    <!--<div class="row">
        <div class="col-xs-12">-->
            <ul class="breadcrumb" style="margin-bottom: 15px;">
<!--                    <li>
                        <a href="#!" class="btn btn-info">Nuevo ingreso</a>
                    </li>-->
<!--                    <li>
                        <a href="<?ph echo SERVERURL; ?>tiposecciones/" class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;  Crear Menus</a>
                    </li>
                    <li>
                        <a href="<?ph echo SERVERURL; ?>secciones/" class="btn btn-info"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;  Añadir Título</a>
                    </li>
                    <li>
                        <a href="<?ph echo SERVERURL; ?>edicionsecciones/" class="btn btn-warning"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;  Editar Secciones</a>
                    </li>-->
                    <li>
                        <a href="<?php echo SERVERURL; ?>contenidos/" class="btn btn-info"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;  Nuevo Contenido</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL; ?>edicionsecciones/" class="btn btn-warning"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;  Editar Contenido del Título</a>
                    </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <?php
                                    $pagina= explode("/",$_GET['vistas']);
                                    echo $insAdmin->paginador_administrador_controlador($pagina[1],10,$_SESSION['cdcuenta_sdo'])
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>