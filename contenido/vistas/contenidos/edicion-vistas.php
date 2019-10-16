<script>
$(function () {
    function addZero(x,n) {
      while (x.toString().length < n) {
        x = "0" + x;
      }
      return x;
    }
$.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#datepicker").datepicker({
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        onSelect: function () {
//            alert(date)
            var valor = $("#datepicker").val();
//            console.log(valor);
            var f = new Date();
            var actual=addZero(f.getDate(), 2) + "/" + (f.getMonth() +1) + "/" + f.getFullYear()
            
//            console.log(actual);
            if(valor < actual){
                      alert('La fecha debe ser mayor a la actual')
            }
        },
        
    });
});
</script>
<script>
$(function () {
    function addZero(x,n) {
      while (x.toString().length < n) {
        x = "0" + x;
      }
      return x;
    }
$.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#datepicker2").datepicker({
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        onSelect: function () {
            var valor = $("#datepicker2").val();
//            console.log(valor);
            var f = new Date();
            var actual=addZero(f.getDate(), 2) + "/" + (f.getMonth() +1) + "/" + f.getFullYear()
//            console.log(actual);
            if(valor < actual){
                      alert('La fecha debe ser mayor a la actual')
            }
        },
    });
});
</script>
<script>
        $(document).ready(function()
        {   
            $('.BlockDeletion').on('keydown', function (e)
            {
                try {                
                    if ((e.keyCode == 8 || e.keyCode == 46))
                        return false;
                    else
                        return true;               
                }
                catch (Exception)
                {
                    return false;
                }
            });        
        });
</script>
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
</script>
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-file-plus zmdi-hc-fw mdc-text-green"></i> Actualización <small> de contenido</small></h1>
    </div>    
</div>
<div class="container-fluid">
<?php 
    $datos= explode("/",$_GET['vistas']);

//    if($_SESSION['tipo_sdo']=="administrador" || $_SESSION['tipo_sdo']=="captura"):
        
        require_once './controladores/administradorControlador.php';
        $clasadmin=new adminstradorControlador();

        $filas=$clasadmin->datos_administrador_controlador("unico",$datos[1],$datos[2]);
        
        $id=$datos[1];
        $idcon=$datos[2];
        
        if($filas->rowCount()==1){
            $campos=$filas->fetch();
            $pdf=$campos['pdf_imagen'];
            $nombrepdf=$campos['archivo'];
            $tipo=$campos['tipo'];
?>
    <ul class="breadcrumb" style="margin-bottom: 15px;">
            <li>
                <a href="<?php echo SERVERURL; ?>edicionsecciones/" class="btn btn-info">Regresar</a>
            </li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="new">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <label class="text-danger">Campos obligatorios "*"</label>
                        <div class="container-fluid">
                                <div class="page-header">
                                  <h1 class="text-titles"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i> Contenido <small> a modificar</small></h1>
                                </div>    
                        </div><br><br>
                                <!--<?ph echo SERVERURL; ?>ajax/contenidoAjax.php?id=<?ph echo $cdseccion ?>-->
                            <form action="<?php echo SERVERURL; ?>ajax/edicionseccionesAjax.php?idseccion=<?php echo $id;?>" method="POST" data-form="save" class="formularioajax form-group-lg" autocomplete="off" enctype="multipart/form-data">
                                <label style="font-size: 20px;" class="text-info">Titulos:<span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="tituloseccion" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" value="<?php echo utf8_decode($campos['nombre']);?>">
                                <input class="form-control" type="hidden" name="tituloriginal" onkeydown="return val(event)" onkeyup="mayus(this);" value="<?php echo utf8_decode($campos['nombre']);?>">
                            </div>
                            <div>
                                <label style="font-size: 20px;" class="text-info">Texto:<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <textarea type="text" name="texto" placeholder="texto" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" class="form-control" rows="3"><?php echo utf8_decode($campos['text']);?></textarea>
                                    <textarea type="text" style="display:none;" name="textooriginal" class="form-control" rows="3"><?php echo utf8_decode($campos['text']);?></textarea>
                                </div>
                            </div>
                            <div>
                                <label style="font-size: 20px;" class="text-info">Link:</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="link" value="<?php echo $campos['link'];?>" placeholder="link (http://www.example.com) ó (https://www.example.com)">
                                    <input class="form-control" type="hidden" name="linkoriginal" value="<?php echo $campos['link'];?>">
                                </div>
                            </div>
                            <div>
                                <label style="font-size: 20px;" class="text-info">Documento o Imagen:</label>
                                <div class="form-group">
                                    <!--<input class="form-control" type="text" name="link" value="<?ph echo $campos['link'];?>">-->
                                    <!--<label class='col-md-2 control-label' for='description'>Imagen &nbsp;<span class='glyphicon glyphicon-picture'></span>&nbsp; ó PDF &nbsp;<span class='fa fa-file-pdf-o'></span></label>-->
                                    <?php
                                        if($tipo=='image/png' || $tipo=='image/jpg' || $tipo=='image/jpeg' || $tipo=='image/tiff' || $tipo=='image/gif'){
                                            echo "<img src='data:image/*; base64," .base64_encode($pdf)."' width='300'>";
                                        }elseif($tipo=='application/pdf'){
                                            echo "<div class='form-group'>
                                                        <p>Para visualizar el pdf click en<a target='_blank' href='".SERVERURL."documento/ver-vistas.php?id=$id&idcon=$idcon' rel='external nofollow'>&nbsp;Ver más...</a></p>
                                                  </div>";
                                        }elseif ($pdf=='') {
                                            echo "<div class='form-group'>
                                                    <p>No existe un documento o imagen para mostrar.</p>
                                                </div>";
                                        }
                                    ?>
                                </div>
                            </div>    
                            <br><br>
                            <!--<div id="div2" style="display:none;">-->
                            <div>
                                <div class="form">
                                    <label style="font-size: 20px;" class="text-info">Selecciona el documento o imagen a guardar</label>&nbsp;<span class="text-danger">(Nota: se requiere volver a seleccionar el archivo o imagen a guardar)</span>
                                    <input type="file" name="pdfimg" placeholder="Buscar...">
                                    <input type="hidden" name="pdfimgoriginal" value="<?php echo $nombrepdf;?>">
                                </div>
                            </div>
                            <br>
                            
                            <div>
                              <label style="font-size: 20px;" class="text-info">Fecha inicio de visualización:<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group">
                              <!--<input class="form-control" type="date" style="width : 125px; heigth : 10px" name="fecha_inicio">-->
                                <!--<input class="form-control" type="text" id="datepicker" style="width : 125px; heigth : 15px" name="fecha_inicio" value="<?ph echo $campos['fecha_inicio'];?>">-->
                                <input class="form-control BlockDeletion" id="datepicker" onkeypress="return nada(event)" style="width : 125px; heigth : 10px" name="fecha_inicio" value="<?php echo $campos['fecha_inicio'];?>">
                                <input class="form-control" type="hidden" style="width : 125px; heigth : 15px" name="fecha_inicio_original" value="<?php echo $campos['fecha_inicio'];?>">
                            </div>
                            <div>
                              <label style="font-size: 20px;" class="text-info">Fecha final de visualización:<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group">
                              <!--<input class="form-control" type="date" style="width : 125px; heigth : 10px" name="fecha_final">-->
                              <!--<input class="form-control" type="text" id="datepicker2" style="width : 125px; heigth : 15px" name="fecha_final" value="<?ph echo $campos['fecha_fin'];?>">-->
                              <input class="form-control BlockDeletion" id="datepicker2" onkeypress="return nada(event)" style="width : 125px; heigth : 10px" name="fecha_final" value="<?php echo $campos['fecha_fin'];?>">
                              <input class="form-control" type="hidden" style="width : 125px; heigth : 15px" name="fecha_final_original" value="<?php echo $campos['fecha_fin'];?>">
                            </div>
                            
<!--                            <div>
                              <label style="font-size: 20px;" class="text-info">Fecha inicio de visualización:<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="fecha_inicio" style="width : 125px; heigth : 10px" value="<?ph echo $campos['fecha_inicio'];?>" placeholder="DD/MM/YYYY"  title="Coloca la fecha con el siguiente formato DD/MM/YYYY" required=""/>
                            </div>
                            <div>
                              <label style="font-size: 20px;" class="text-info">Fecha final de visualización:<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="fecha_final" style="width : 125px; heigth : 10px" value="<?ph echo $campos['fecha_fin'];?>" placeholder="DD/MM/YYYY"  title="Coloca la fecha con el siguiente formato DD/MM/YYYY" required="">
                            </div>-->
                                <p class="text-center">
                                    <button type="submit" class="btn btn-info btn-raised btn-lg"><i class="zmdi zmdi-floppy zmdi-hc-lg"></i> Guardar Contenido</button>
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
        <!--else {
?>
        <h4>Lo Sentimos</h4>
        <p>No Podemos mostrar la Información de la Base de Datos, No tienes suficientes permisos</p>
<?ph
        }
?> 
<?ph endif; ?>-->
</div>