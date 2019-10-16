<?php
    if($_SESSION['tipo_sdo']=="administrador"):
//        echo $lc->forzar_cierre_sesion_controlador();
?>
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account-add zmdi-hc-fw mdc-text-green"></i> Ingreso <small> de Usuarios</small></h1>
    </div>    
</div>
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
                            <div class="col-xs-12 col-md-10 col-md-offset-1"><!--data-form="save" class=""-->
                                <label class="text-danger">Campos obligatorios "*"</label>
                                <form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" data-form="" method="POST"  class="formularioajax form-group-lg" autocomplete="off" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-account-box zmdi-hc-fw"></i> Datos <small> del Usuario</small></h1>
                                        </div>    
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre(s):<span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="nombre" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" placeholder="Nombre" >
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Apellido Paterno:<span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="ap_paterno" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" placeholder="Apellido Paterno">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Apellido Materno:<span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="ap_materno" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" placeholder="Apellido Materno">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Puesto:<span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="area" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" placeholder="Puesto">
                                    </div>
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-key zmdi-hc-fw"></i> Datos <small> de la Cuenta</small></h1>
                                        </div>    
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Nombre de Usuario:<span class="text-danger">*</span></label>
                                      <input class="form-control" type="text" name="nom_usuario" onkeypress="return soloLetras2(event)" onkeyup="mayus(this);" placeholder="Nombre de Usuario">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Contraseña:<span class="text-danger">*</span></label>
                                      <input class="form-control" id="UserPass" type="password" name="contrasenia" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Repetir Contraseña:<span class="text-danger">*</span></label>
                                      <input class="form-control" id="UserPass" type="password" name="contrasenia2" placeholder="Repetir Contraseña">
                                    </div>
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> Tipo <small> de usuario<span class="text-danger">*</span></small></h1>
                                        </div>    
                                    </div>
                                    <div class="form-group label-floating">
                                        <select name="radio" class="form-control">
                                           <option value="">Selecciona Un Tipo de Usuario</option>
                                           <option value="administrador">Administrador</option>
                                           <option value="captura">Captura</option>
                                        </select>
                                    </div>
<!--                                    <div class="form-group label-floating">
                                        <div class="radio">
                                            <label><input type="radio" name="tipo" id="tipo1" value="administrador">Administrador</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="tipo" id ="tipo2" value="captura">Captura</label>
                                        </div>
                                    </div>-->
<!--                                    <div class="form-group label-floating">
                                        <select name="radio" class="form-control">
                                           <option value="">Selecciona Un Tipo de Usuario</option>
                                           <option value="administrador">Administrador</option>
                                           <option value="captura">Captura</option>
                                        </select>
                                    </div>-->
                                        <p class="text-center">
                                            <button type="submit" class="btn btn-info btn-raised btn-lg"><i class="zmdi zmdi-floppy zmdi-hc-lg"></i> Guardar Datos</button>
                                            <div class="RespuestaAjax"></div>
                                        </p>
                                </form>
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