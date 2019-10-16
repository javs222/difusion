<?php
    if($_SESSION['tipo_sdo']=="administrador"):
//        echo $lc->forzar_cierre_sesion_controlador();
?>
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw mdc-text-green"></i> Actualización <small> de Usuarios</small></h1>
    </div>    
</div>
<div class="container-fluid">
    <?php 
    $datos= explode("/",$_GET['vistas']);

//    if($_SESSION['tipo_sdo']=="administrador" || $_SESSION['tipo_sdo']=="captura"):
        
        require_once './controladores/actualizaradminlistControlador.php';
        $clasadmin=new adminlistadoControlador();

        $filas=$clasadmin->datos_actualizar_listado_administrador_controlador("unico",$datos[1]);
        
//        $id=$datos[1];
//        $idcon=$datos[2];
        if($filas->rowCount()>=1){
            $campos=$filas->fetch();
            $nombre=utf8_decode($campos['nombre']);
            $apellidopa=utf8_decode($campos['apellido_paterno']);
            $apellidoma=utf8_decode($campos['apellido_materno']);
            $usuario=$campos['usuario'];
            $clave=mainModel::decryption($campos['clave']);
            $privilegio=$campos['privilegio'];
            $cdcuenta=$campos['cdcuenta'];
            $area=utf8_decode($campos['puesto']);
    ?>
    <ul class="breadcrumb" style="margin-bottom: 15px;">
<!--        <li>
            <a href="<?ph echo SERVERURL; ?>admin/" class="btn btn-info text-center"><i class="zmdi zmdi-accounts-add zmdi-hc-lg"></i>&nbsp; Ingreso Nuevo</a>
        </li>-->
        <li>
            <a href="<?php echo SERVERURL; ?>adminlist/" class="btn btn-success text-center"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-lg"></i>&nbsp; Regresar al Listado de usuarios</a>
        </li>
        
    </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form action="<?php echo SERVERURL; ?>ajax/actualizarlistadoAjax.php?cdcuenta=<?php echo $cdcuenta;?>" method="POST" data-form="save" class="formularioajax form-group-lg" autocomplete="off" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-account-box zmdi-hc-fw"></i> Datos <small> del Usuario</small></h1>
                                        </div>    
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Nombre(s):</label>
                                      <input class="form-control" type="text" name="nombre" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" value="<?php echo $nombre;?>" placeholder="Nombre" >
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Apellido Paterno:</label>
                                      <input class="form-control" type="text" name="ap_paterno" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" value="<?php echo $apellidopa;?>" placeholder="Apellido Paterno">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Apellido Materno:</label>
                                      <input class="form-control" type="text" name="ap_materno" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" value="<?php echo $apellidoma;?>" placeholder="Apellido Materno">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Puesto:</label>
                                      <input class="form-control" type="text" name="area" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" value="<?php echo $area;?>" placeholder="Puesto">
                                    </div>
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-key zmdi-hc-fw"></i> Datos <small> de la Cuenta</small></h1>
                                        </div>    
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Nombre de Usuario:</label>
                                      <input class="form-control" type="text" name="nom_usuario" onkeypress="return soloLetras2(event)" onkeyup="mayus(this);" value="<?php echo $usuario;?>" placeholder="Nombre de Usuario">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Contraseña:</label>
                                      <input class="form-control" type="text" name="contrasenia" onkeyup="mayus(this);" value="<?php echo $clave;?>" placeholder="Contraseña">
                                    </div>
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> Tipo <small> de usuario</small></h1>
                                        </div>    
                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="radio">
                                            <label><input type="radio" name="tipo" value="administrador" <?php echo ($privilegio=='administrador')?'checked':'' ?>>Administrador</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="tipo" value="captura" <?php echo ($privilegio=='captura')?'checked':'' ?>>Captura</label>
                                        </div>
                                    </div>
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
    <?php
            
        }
    ?>
</div>
<?php
else:
?>
    <div class="full-width panel-content">
        <h4 class="text-center">Lo siento, No existe Información</h4>
        <p class="text-center" style="color: red;">¡No Tienes Permisos de Administrador!</p>
    </div>
<?php endif;?>
