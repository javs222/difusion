<?php 
    $datos= explode("/",$_GET['vistas']);
    $id=$datos[1];
    $tipo=$datos[2];
    $id=mainModel::decryption($id);
    $tipo=mainModel::decryption($tipo);
    
//print_r($tipo);
//print_r($id);
    
    require_once "./controladores/vistageneralControlador.php";
                    $instancia= new vistageneralControlador();
                    $tipo_secciones= $instancia->vista_general_controlador($id,$tipo);
?>
<script type="text/javascript">
$(document).ready(function() {
        var id="<?php echo $id;?>";
        var tipo="<?php echo $tipo;?>";
//        function changeNumber() {
        $.ajax
        ({
            sync:  false, 
            type: "POST",
            Type:"html",
            url: "http://10.11.24.69/secciones/ajax/showhidenAjax.php?id="+id+"&tipo="+tipo,
//            data: { valor : val },
            success: function(data) 
            {
//                var datos        = eval("(" + data + ")");
//                for (var i=0;i<datos.length;i++) {
//                    var nombre=datos[i].nombre;
//                    var texto=datos[i].texto;
//                    var link=datos[i].link;
////                    var pdfimagen=datos[i].pdfimagen;
//                    var fechaini=datos[i].finicio;
//                    var final=datos[i].final;
//                    var idcon=datos[i].idcon;
//                    var cdseccion=datos[i].cdseccion;
//                    var contador=datos.length;
                    
//                    var con= '<input class="form-control" type="text" value='+contador+' name="con">\n\
//                              <input class="form-control" type="text" value='+contador+' name="con">';
//                    $.post('http://10.11.24.69/secciones/vistas/contenidos/vistageneral',{con:contador}),
//                    console.log(nombre);
//                    console.log(texto);
//                    console.log(link);
////                    console.log(pdfimagen);
//                    console.log(idcon);
//                    console.log(fechaini);
//                    console.log(final);
//                    console.log(cdseccion);
//                    console.log(i);
//                    console.log(contador);
                   
//                }
//                    var n =  new Date();//Año
//                    var y = n.getFullYear();//Mes
//                    var m = n.getMonth() + 1;//Día
//                    var d = n.getDate();
//                    if(d<10)
//                    d='0'+d; //agrega cero si el menor de 10
//                    if(m<10)
//                    m='0'+m; 
//                    var anio = d+"/"+m+"/"+y;
                    //console.log(anio);
                    
                    

//                    if(anio >= fechaini){
//                        $("#div1").show();
//                        $('#titulo').text(nombre);
//                        $('#texto').text(texto);
//                        $('#link').text(link);
                        $('#todo').html(data);
//                        $('#contador').html(con);
    //                    $("#div2").hide();
    //                    $("#div2").disabled=true;
                        //document.getElementById("div1").appendChild(todo);la variable contiene toda la infmacion
//                    }
//                    else if(anio <= final){
//                        $("#div1").hide();
//                    }
//                }
//                $.post('http://10.11.24.69/secciones/vistas/contenidos/vistageneral-vistas.php',{con:contador}),
            }
            
        });
//        }
//    setInterval(changeNumber, 5000);
});
</script>
<div class="panel panel-default" id="todo">
    <!--<div id="contador"></div>-->
    <!--<div id="contenedor"></div>-->
<!--    <div id="todo">
        
    </div>-->
</div>