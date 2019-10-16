<!--<?ph if($peticionAjax){
         require_once "../nucleo/mainModel.php";
     }else {
         require_once "./nucleo/mainModel.php";
     }

$connect = mysqli_connect("localhost", "root", "", "correspondencias");


 $query = "SELECT
                    cuentas.clave
                    FROM
                    cuentas
                    WHERE
                    cuentas.cdcuenta = 'SA920612294'";
 $result = mysqli_query($connect, $query);
// $rows = mysqli_fetch_array($result)
 
// $query2= mainModel::decryption($result);
// print_r($query->errorInfo());
?>
<table width="80%" bordered="2" align="center">  
                    <tr bgcolor="#5970B2" align="center">
                        
                        <th>Fecha del Oficio</th>
                        
                    </tr>
<?ph
//  ';
  while($rows = mysqli_fetch_array($result))
  {
//   $output .= '
?>
    <tr align="center">
        
        <td><?ph echo $clave= mainModel::decryption($rows['clave']); ?></td>
        
    </tr>
   <!--';->
<?ph
   
  }
//  $output .= ' 
?>
          </table>
-->
<?php
    if($_SESSION['tipo_sdo']=="administrador"):
//        echo $lc->forzar_cierre_sesion_controlador();
    
?>
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-key zmdi-hc-fw mdc-text-green"></i> Recuperación <small> de Contraseña</small></h1>
    </div>    
</div>
<div class="container-fluid">
<!--    <ul class="breadcrumb" style="margin-bottom: 15px;">
        <li>
            <a href="<?ph echo SERVERURL; ?>admin/" class="btn btn-info text-center"><i class="zmdi zmdi-accounts-add zmdi-hc-lg"></i>&nbsp; Ingreso Nuevo</a>
        </li>
        <li>
            <a href="<?ph echo SERVERURL; ?>busquedatramite/" class="btn btn-success text-center"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-lg"></i>&nbsp; Listado de usuarios</a>
        </li>
        
    </ul>-->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1"><!--<?ph echo SERVERURL; ?>ajax/recuperarAjax.php-->
                                <form action="" method="POST" data-form="" class="form-group-lg" autocomplete="off" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-account-box zmdi-hc-fw"></i> Datos <small> del Usuario</small></h1>
                                        </div>    
                                    </div>
<!--                                    <div class="form-group label-floating">
                                      <label class="control-label">Nombre(s):</label>
                                      <input class="form-control" type="text" name="nombre" onkeydown="return val(event)" onkeyup="mayus(this);" placeholder="Nombre" >
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Apellido Paterno:</label>
                                      <input class="form-control" type="text" name="ap_paterno" onkeydown="return val(event)" onkeyup="mayus(this);" placeholder="Apellido Paterno">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Apellido Materno:</label>
                                      <input class="form-control" type="text" name="ap_materno" onkeydown="return val(event)" onkeyup="mayus(this);" placeholder="Apellido Materno">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Puesto:</label>
                                      <input class="form-control" type="text" name="area" onkeydown="return val(event)" onkeyup="mayus(this);" placeholder="Puesto">
                                    </div>
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-key zmdi-hc-fw"></i> Datos <small> de la Cuenta</small></h1>
                                        </div>    
                                    </div>-->
                                    <div class="form-group label-floating">
                                      <label class="control-label">Nombre de Usuario:</label>
                                      <input class="form-control" type="text" name="nom_usuario" onkeydown="return val(event)" onkeyup="mayus(this);" placeholder="Nombre de Usuario">
                                    </div>
<!--                                    <div class="form-group label-floating">
                                      <label class="control-label">Contraseña:</label>
                                      <input class="form-control" id="UserPass" type="password" name="contrasenia" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Repetir Contraseña:</label>
                                      <input class="form-control" id="UserPass" type="password" name="contrasenia2" placeholder="Repetir Contraseña">
                                    </div>
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> Tipo <small> de usuario</small></h1>
                                        </div>    
                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="radio">
                                            <label><input type="radio" name="tipo" value="administrador">Administrador</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="tipo" value="captura">Captura</label>
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
                                            <button type="submit" class="recuperar btn btn-info btn-raised btn-lg"><i class="zmdi zmdi-lock-open zmdi-hc-lg"></i> &nbsp;Recuperar Contraseña</button>
                                            <!--<div class="recuperar"></div>-->
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
        <h4 class="text-center">Lo siento, No existe Información</h4>
        <p class="text-center" style="color: red;">¡No Tienes Permisos de Administrador!</p>
    </div>
<?php endif;?>