<script type="text/javascript">
//$(document).ready(function() {

    function select_tipo() {
//        var codigo = document.forms.formulario.cdsecciones.value();
        var cdseccion = $('#select_tipo').val();
        $.ajax
        ({
            sync:  false, 
            type: "POST",
            Type:"html",
            url: 'http://10.11.24.69/contenido/ajax/httpushAjax.php?token='+cdseccion,
            success: function(data) 
            {
//                var datos        = eval("(" + data + ")");
//                var atender          = datos.atender;
//                var tipo          = datos.tipo;
//                document.cookie ='variable='+cdseccion+'; path=/';
//                $.post("", {codigo: cdseccion});
                
                $('#tipo_seccion').html(data);
//                var asignado= "<label style='font-size: 20px;' class='text-info'>Asignado al menú:</label>";
//                $('#asignacion').html(asignado);
//                var html= "<input class='form-control' type='hidden' value="+cdseccion+" name='cd' hidden>";
//                $('#codigo').html(html);
//                console.log(cdseccion);

            }
        });
//        window.location="codigo=" + cdseccion;
//        $.post("", {codigo: cdseccion});
    }
    
//    function validarFormatoFecha(campo) {
//      var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
//      if ((campo.match(RegExPattern)) && (campo!='')) {
//            return true;
//      } else {
//            return false;
//      }
//}
    
//    setInterval(changeNumber, 500);
//});
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
<!--<script type="text/javascript">
    function select_tipo(){
        var cdseccion = $("#select_tipo").val();
    console.log(cdseccion)
        alert("hola select =" +cdseccion);
    }
</script>-->
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
        <h1 class="text-titles"><i class="zmdi zmdi-file-plus zmdi-hc-fw mdc-text-green"></i> Registro <small> de contenidos</small></h1>
    </div>    
</div>
<div class="container-fluid">
    <!--<div class="row">
        <div class="col-xs-12">-->
            <ul class="breadcrumb" style="margin-bottom: 15px;">
                    <li>
                        <a href="<?php echo SERVERURL; ?>contenidos/" class="btn btn-info"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;  Nuevo Contenido</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL; ?>edicionsecciones/" class="btn btn-warning"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;  Editar Contenido del Título</a>
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
                                          <h1 class="text-titles"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i> Contenido <small> del título</small></h1>
                                        </div>    
                                    </div><br><br>
<!--                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Selecciona un Título:</label>
                                        <div class="form-group">
                                            <?ph
                                            $consulta=mainModel::ejecutar_consulta_simple2("SELECT * FROM secciones");
                                            ?>
                                            <select name="secciones" class="form-control" id="select_tipo"  onchange="select_tipo(this.value)" required>
                                                <option value="">Selecciona un titulo para asignar contenido.</option>
                                                <?ph while ($row=$consulta->fetch())
                                                    {
                                                        $titulo=  utf8_encode($row['nombre']);
                                                        $tipo=$row['idtiposecciones'];
                                                        $cdseccion=$row['idtiposecciones'];
                                                        $id=$row['idsecciones'];
//                                                        $cdseccion=  mainModel::encryption($cdseccion);
                                                ?>
                                                <option value="<?ph echo $cdseccion;?>"><?ph echo $titulo?></option>
                                                <?ph   }?>
                                            </select>
                                        </div>
                                    </div><br><br>
                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Asignado al menú:</label>
                                        <div  id="tipo_seccion">
                                            
                                        </div>
                                    </div><br><br>-->
<!--                                    <?ph 
                                        $variable=$_POST['cdseccion'];
//                                        echo $variable;
//                                        print_r($variable);?cdsecciones=<?ph echo $variable; ?>
                                    ?>-->
                                    <form action="<?php echo SERVERURL;?>ajax/contenidoAjax.php" method="POST" data-form="save" class="formularioajax form-group-lg" autocomplete="off" enctype="multipart/form-data">

<!--                                    <div id="codigo">
                                        
                                    </div>-->
                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Selecciona un Título:<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <?php
                                            $consulta=mainModel::ejecutar_consulta_simple2("SELECT
                                                                                                    secciones.idsecciones,
                                                                                                    secciones.nombre,
                                                                                                    secciones.idtiposecciones,
                                                                                                    tiposecciones.tiposeccion
                                                                                                    FROM
                                                                                                    secciones
                                                                                                    INNER JOIN tiposecciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones");
                                            ?>
                                            <select name="secciones" class="form-control">
                                                <option value="">Selecciona un titulo para asignar contenido.</option>
                                                <?php while ($row=$consulta->fetch())
                                                    {
                                                        $titulo= utf8_decode($row['nombre']);
                                                        $tipo=$row['idtiposecciones'];
                                                        $cdseccion=$row['idtiposecciones'];
                                                        $id=$row['idsecciones'];
                                                        $menu= utf8_decode($row['tiposeccion']);
//                                                        $cdseccion=  mainModel::encryption($cdseccion);
                                                ?>
                                                <option value="<?php echo $id;?>"><?php echo $titulo. ' - ' .$menu?></option>
                                                <?php   }?>
                                            </select>
                                        </div>
                                    </div><br><br>
                                    <div>
                                        <!--<label style="font-size: 20px;" class="text-info">Asignado al menú:</label>-->
                                        <div  id="tipo_seccion">
                                            
                                        </div>
                                    </div><br><br>
                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Texto:<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            
                                            <textarea type="text" name="texto" placeholder="texto" onkeypress="return soloLetras(event)" onkeyup="mayus(this);" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <label style="font-size: 20px;" class="text-info">Link:</label>
                                        <div class="content-row">
                                          <div class="row">
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <select name="url" class="form-control" style="width : 80px; heigth : 10px">
                                                           <!--<option value="">URL</option>-->
                                                           <option value="https://">https://</option>
                                                           <option value="http://">http://</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group-btn">
                                                        <input type="text" class="form-control" style="width : 800px; heigth : 10px" name="link" placeholder="link (www.ejemplo.com)">
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                            <!--<label style="font-size: 20px;" class="text-info">URL:</label>-->
<!--                                            <div class="form-group">
                                                <select name="prioridad" class="form-control">
                                                   <option value="">URL</option>
                                                   <option value="1">https:</option>
                                                   <option value="2">http:</option>
                                                   <option value="3">Bajo</option>
                                                </select>
                                            </div>
                                            <input class="form-control" type="text" name="link" placeholder="link (https://www.ejemplo.com)">-->
                                        <!--</div>-->
                                    </div>
                                    <br><br>
                                    <!--<div id="div2" style="display:none;">-->
                                    <div>
                                        <div class="form">
                                            <label style="font-size: 20px;" class="text-info">Selecciona el documento o imagen a guardar</label>
                                            <input type="file" name="pdfimg" placeholder="Buscar...">
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                      <label style="font-size: 20px;" class="text-info">Fecha inicio de visualización:<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-group">
                                      <!--<input class="form-control" type="date" style="width : 125px; heigth : 10px" name="fecha_inicio">-->
                                        <?php $fechaactual= date("d/m/Y"); ?>
                                        <!--<input class="form-control" type="date" onkeypress="return nada(event)" style="width : 125px; heigth : 15px" name="fecha_inicio" placeholder="dd/mm/yyyy">-->
                                        <input class="form-control BlockDeletion" id="datepicker" onkeypress="return nada(event)" style="width : 125px; heigth : 10px" name="fecha_inicio">
                                    </div>
                                    <div>
                                      <label style="font-size: 20px;" class="text-info">Fecha final de visualización:<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-group">
                                      <!--<input class="form-control" type="date" style="width : 125px; heigth : 10px" name="fecha_final">-->
                                      <!--<input class="form-control" type="text" id="datepicker2" style="width : 125px; heigth : 15px" name="fecha_final">-->
                                      <input class="form-control BlockDeletion" id="datepicker2" onkeypress="return nada(event)" style="width : 125px; heigth : 10px" name="fecha_final">
                                    </div>
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
        <!--</div>
    </div>-->
</div>