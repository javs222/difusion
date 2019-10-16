            <?php
                //require "./controladores/contraseniaControlador.php";
                //$instancia= new contraseniaControlador();
                $codigo=$_SESSION['cdcuenta_sdo'];
                //$conteo= $instancia->actualizar_contrasenia_controlador($codigo);
            ?>
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-refresh zmdi-hc-fw mdc-text-green"></i> Cambiar <small> Contraseña</small></h1>
    </div>    
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
        

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form action="<?php echo SERVERURL; ?>ajax/contraseniaAjax.php?token=<?php echo $codigo; ?>" method="POST" data-form="update" class="formularioajax form-group-lg" autocomplete="off" enctype="multipart/form-data">
                                    
<!--                                    <div class="form-group label-floating">
                                      <label class="control-label">Contraseña Actual:</label>
                                      <input class="form-control" id="UserPass" type="password" name="actual" placeholder="Contraseña">
                                    </div>-->
                                    <div class="form-group label-floating">
                                      <label class="control-label">Nueva Contraseña:</label>
                                      <input class="form-control" id="UserPass" type="password" name="contrasenia" placeholder="Nueva Contraseña">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Repetir Nueva Contraseña:</label>
                                      <input class="form-control" id="UserPass" type="password" name="contrasenia2" placeholder="Repetir Nueva Contraseña">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Nombre de Usuario:</label>
                                      <input class="form-control" id="UserPass" type="text" name="nombreusuario" placeholder="Nombre de Usuario">
                                    </div>

                                        <p class="text-center">
                                            
                                            <button type="submit" class="btn btn-info btn-raised btn-lg"><i class="zmdi zmdi-refresh zmdi-hc-lg"></i> Actualizar Contraseña</button>
                                            
                                            <div class="RespuestaAjax"></div>
                                            
                                        </p>
                                        
                                </form>
                                <!--<a href="<?ph echo $codigo->encryption($_SESSION['cdcuenta_ssc']);?>"></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>