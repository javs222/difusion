<!--<script type="text/javascript">
    $(document).ready(function() {
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
        if(valor =="text_link"){
            $("#div1").show();
            $("#div2").hide();
            $("#div2").disabled=true;
            //document.getElementById("div2").disabled = true;
        } else if (valor == "pdf_img") {
            $("#div1").hide();
            $("#div1").disabled=true;
            //document.getElementById("div1").disabled = true;
            $("#div2").show();
        } else { 
//            $("#div1").hide();
//            $("#div2").hide();
        }
    });
});
</script>-->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-view-list-alt zmdi-hc-fw mdc-text-green"></i> Crear <small> menús</small></h1>
    </div>    
</div>
<?php 
//    require_once "./controladores/seccionesControlador.php";
//    $doc= new seccionesControlador();

    $codigo=$_SESSION['cdcuenta_sdo'];
?>
<div class="container-fluid">
    <!--<div class="row">
        <div class="col-xs-12">-->
            <ul class="breadcrumb" style="margin-bottom: 15px;">
<!--                    <li>
                        <a href="#!" class="btn btn-info">Nuevo ingreso</a>
                    </li>-->
                    <li>
                        <a href="<?php echo SERVERURL; ?>tiposecciones/" class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;  Crear menús</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL; ?>secciones/" class="btn btn-info"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;  Añadir título al menú</a>
                    </li>
<!--                    <li>
                        <a href="<?ph echo SERVERURL; ?>edicionsecciones/" class="btn btn-warning"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;  Editar Secciones</a>
                    </li>-->
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <label class="text-danger">Campos obligatorios "*"</label>
                                <form action="<?php echo SERVERURL; ?>ajax/tiposeccionesAjax.php" method="POST" data-form="save" class="formularioajax form-group-lg" autocomplete="off" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Nuevo <small> menú a ingresar</small></h1>
                                        </div>    
                                    </div><br><br><br>
                                    <div>
                                      <label style="font-size: 20px;" class="text-info">Menú a ingresar:<span class="text-danger">*</span></label>
                                      <input class="form-control" name="tipo_seccion" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" placeholder="Menú a ingresar">
                                    </div>
<!--                                    <div>
                                      <label style="font-size: 20px;" class="text-info">Tipo de la sección:</label>
                                      <input class="form-control" type="text" name="tipo_seccion" placeholder="Tipo de la sección:">
                                    </div>-->
<!--                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Tipo de Sección:</label>
                                        <div class="form-group">
                                            <select name="tipo_seccion" class="form-control">
                                               <option value="">Selecciona una opción</option>
                                               <option value="Finanzas">Finanzas</option>
                                               <option value="Sacmex">Sacmex</option>
                                               <option value="General">General</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Prioridad a visualizar:</label>
                                        <div class="form-group">
                                            <select name="prioridad" class="form-control">
                                               <option value="">Selecciona una opción</option>
                                               <option value="1">Prioridad</option>
                                               <option value="2">Medio</option>
                                               <option value="3">Bajo</option>
                                            </select>
                                        </div>
                                    </div>-->
<!--                                    <div class="container-fluid">
                                        <div class="page-header">
                                          <h1 class="text-titles"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Contenido <small> que tendra la sección</small></h1>
                                        </div>    
                                    </div><br><br>-->
                                    
<!--                                    <div class="form-group label-floating">
                                        <div class="radio">
                                            <label><input type="radio" name="radio" value="text_link">Agregar texto o un link</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="radio" value="pdf_img">Agregar un documento PDF o imagen</label>
                                        </div>
                                    </div>-->
                                    

                                    <!--<div id="div1" style="display:none;">-->
<!--                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Texto:</label>
                                        <div class="form-group">
                                            
                                            <textarea type="text" name="texto" placeholder="texto" onkeyup="mayus(this);" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Link:</label>
                                        <div class="form-group">
                                            
                                            <input class="form-control" type="text" name="link" placeholder="link (http://www.example.com)">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div id="div2" style="display:none;">
                                    <div>
                                        <div class="form">
                                            <label style="font-size: 20px;" class="text-info">Selecciona el documento o imagen a guardar</label>
                                            <input type="file" name="pdfimg" placeholder="Buscar...">
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                      <label style="font-size: 20px;" class="text-info">Fecha inicio de visualización:</label>
                                    </div>
                                    <div class="form-group">
                                      <input class="form-control" type="date" name="fecha_inicio"  placeholder="Fecha del Documento">
                                    </div>
                                    <div>
                                      <label style="font-size: 20px;" class="text-info">Fecha final de visualización:</label>
                                    </div>
                                    <div class="form-group">
                                      <input class="form-control" type="date" name="fecha_final"  placeholder="Fecha del Documento">
                                    </div>-->
                                        <p class="text-center">
                                            <button type="submit" class="btn btn-info btn-raised btn-lg"><i class="zmdi zmdi-floppy zmdi-hc-lg"></i> Guardar Sección</button>
                                            <div class="RespuestaAjax"></div>
                                        </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>
    </div>-->
</div>