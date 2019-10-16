<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Subdirección de Desarrollo Organizacional</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="<?php echo SERVERURL;?>favicon_16.ico"/>
    <link rel="bookmark" href="<?php echo SERVERURL;?>favicon_16.ico"/>
    <link rel="stylesheet" href="<?php echo SERVERURL;?>dist/css/site.min.css">
    <link href="<?php echo SERVERURL; ?>bootflat-admin/css/material-design-color-palette.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SERVERURL; ?>bootflat-admin/css/material-design-color-palette.min.css" rel="stylesheet" type="text/css"/>       
    <link href="<?php echo SERVERURL; ?>bootflat-admin/css/material-design-iconic-font.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <script src="<?php echo SERVERURL; ?>bootflat-admin/js/material.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> 
    <script type="text/javascript" src="<?php echo SERVERURL;?>dist/js/site.min.js"></script>
  </head>
<body>
<!--    <script type="text/javascript">
    $(document).ready(function() {
//            var id="<?ph echo $id; ?>";
//            var tipo="<?ph echo $tipo; ?>";
    //        function changeNumber() { ?id="+id+"&tipo="+tipo
            $.ajax
            ({
                sync:  false, 
                type: "POST",
                Type:"html",
                url: "http://10.11.24.69/secciones/ajax/httpushAjax.php",
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
    </script>-->
<!--    <script type="text/javascript">
$(document).ready(function() {
    function changeNumber() {
        //var token = '<?ph //echo $codigo ?>'?token='+token;
        $.ajax
        ({
            sync:  false, 
            type: "POST",
            Type:"html",
            url: 'http://10.11.24.69/secciones/ajax/httpushAjax.php',
            success: function(data) 
            {
//                var datos        = eval("(" + data + ")");
//                var atender          = datos.atender;
//                var estatus          = datos.estatus;
//                document.cookie ='variable='+atender+'; expires=Thu, 2 Aug 2021 20:47:11 UTC; path=/';
                //$.post('', {variable: atender});
                //window.location="atender=" + atender + "estatus=" + estatus;
//                $('#atender').text(atender);
                $('#contenido').html(data);
                //console.log(atender);

            }
        });
    }
    setInterval(changeNumber, 50000);
    
//    function primero() {
//        //var token = '<?ph //echo $codigo ?>'?token='+token;
////        $.ajax
////        ({
////            sync:  false, 
////            type: "POST",
////            Type:"html",
////            url: 'http://10.11.24.69/secciones/ajax/httpushAjax.php',
////            success: function(data) 
////            {
//////                var datos        = eval("(" + data + ")");
//////                var atender          = datos.atender;
//////                var estatus          = datos.estatus;
//////                document.cookie ='variable='+atender+'; expires=Thu, 2 Aug 2021 20:47:11 UTC; path=/';
////                //$.post('', {variable: atender});
////                //window.location="atender=" + atender + "estatus=" + estatus;
//////                $('#atender').text(atender);
////                $('#contenido').html(data);
////                //console.log(atender);
////
////            }
////        });
//    }
//    setInterval(primero, 500);
});
</script>-->
        <?php 
               $peticionAjax=FALSE;
            require_once "./controladores/vistasControlador.php"; 
            $vt = new vistasControlador();
            $vistasR = $vt->obtener_vistas_controlador();
            if($vistasR=="login" || $vistasR=="404"):
                if($vistasR=="login"){
                    require_once "./vistas/contenidos/login-vistas.php";
                }else{
                    require_once "./vistas/contenidos/404-vistas.php";
                }
            else:
//                session_start(['name'=>'SDO']);
//                require_once "./controladores/logincontrolador.php";
                
//                $lc= new loginControlador();
//                if(!isset($_SESSION['token_sdo']) || !isset($_SESSION['usuario_sdo'])){
//                    $lc->forzar_cierre_sesion_controlador();
//                }
        ?>
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                    <li class="list-group-item"><i class="glyphicon  glyphicon glyphicon-home"></i><a href="<?php echo SERVERURL;?>index"><b> Inicio</b></a></li>
                <?php
//                    require_once "./controladores/httpushControlador.php";
//                    $instancia= new httpushControlador();
//                    $finanzas= $instancia->actualizar_httpush();
//                    
//                    require_once "./controladores/sacmexControlador.php";
//                    $instancia2= new sacmexControlador();
//                    $sacmex= $instancia2->sacmex();
//                    
//                    require_once "./controladores/generalControlador.php";
//                    $instancia3= new generalControlador();
//                    $general= $instancia3->general();
//                    
//                    require_once "./controladores/todoControlador.php";
//                    $instancia4= new todoControlador();
//                    $todo= $instancia4->obtener_todo();
                    ////////////////////////////////////////////////////////
                    require_once "./controladores/contadorControlador.php";
                    $instancia6= new contadorControlador();
                    $contador= $instancia6->obtener_contador();
                    
                    require_once "./controladores/tipoControlador.php";
                    $instancia5= new tipoControlador();
                    $tipos= $instancia5->obtener_tipo();
//                    
//                    require_once "./controladores/contadortituloControlador.php";
//                    $instancia7= new contadortituloControlador();
//                    $contadortitulo= $instancia7->obtener_contador_titulo();
                    
                    $i=1;
                ?>
                <?php 
                        for($a=1;$a<=$contador;$a++){
                            while($row=$tipos->fetch(PDO::FETCH_ASSOC)){ 
                                $tiposeccion=$row['tiposeccion'];
                                $fechaactual= date("d/m/Y");
//                                    $tipo=$row['tiposeccion'];
//                                    $titulo=  utf8_encode($row['nombre']);
//                                    $id=$row['idsecciones'];
//                                $f_final=$row['fecha_fin'];
//                                $finicio=$row['fecha_inicio'];
                                $estatus=$row['estatus'];
//                                    $id= mainModel::encryption($id);
//                                    $tipo= mainModel::encryption($tipo);


//                                $separa = explode('/',$finicio);
//                                $dia = $separa[0];
//                                $mes = $separa[1];
//                                $anio = $separa[2];

//                                $ffsepara = explode('/',$f_final);
//                                $diaf = $ffsepara[0];
//                                $mesf = $ffsepara[1];
//                                $aniof = $ffsepara[2];
                                
//                            print_r($dia);
//                            print_r($mes);
//                            print_r($anio);
                            
                                
                                $actualsepara = explode('/',$fechaactual);
                                $diaact = $actualsepara[0];
                                $mesact = $actualsepara[1];
                                $anioact = $actualsepara[2];
                                
                                $consulta=mainModel::ejecutar_consulta_simple("SELECT
                                                                                        tiposecciones.idtiposecciones,
                                                                                        tiposecciones.tiposeccion,
                                                                                        secciones.nombre,
                                                                                        contenidos.fecha_fin,
                                                                                        contenidos.fecha_inicio,
                                                                                        secciones.idsecciones,
                                                                                        secciones.estatus AS status
                                                                                        FROM
                                                                                        secciones
                                                                                        INNER JOIN tiposecciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones
                                                                                        INNER JOIN contenidos ON secciones.idsecciones = contenidos.idsecciones
                                                                                        WHERE
                                                                                        tiposecciones.tiposeccion ='$tiposeccion'");
                                
//                                $consulta2=mainModel::ejecutar_consulta_simple("SELECT
//                                                                                        tiposecciones.idtiposecciones,
//                                                                                        tiposecciones.tiposeccion,
//                                                                                        secciones.nombre,
//                                                                                        contenidos.fecha_inicio,
//                                                                                        contenidos.fecha_fin,
//                                                                                        secciones.estatus
//                                                                                        FROM
//                                                                                        secciones
//                                                                                        INNER JOIN tiposecciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones
//                                                                                        INNER JOIN contenidos ON secciones.idsecciones = contenidos.idsecciones
//                                                                                        ORDER BY
//                                                                                        tiposecciones.idtiposecciones ASC");
                                
                                $ancla='#demo'.$i;
                                $collapse='demo'.$i;
//                                while($r=$consulta2->fetch(PDO::FETCH_ASSOC)){
//                                    $estatus=$r['estatus'];
//                                    print_r($estatus);
//                                }
                            
                                                               
//                        if($dia<=$diaact AND $mes<=$mesact AND $anio<=$anioact){
     
//                             if($final>=$fechaactual){
                           if($estatus==1){
                                
                ?>
                    <a href="<?php echo $ancla;?>" class="list-group-item" data-toggle="collapse"><?php echo utf8_decode($tiposeccion);?><span class="glyphicon glyphicon-chevron-right"></span></a>
                  <div id="contenido"></div>
                    <li class="collapse" id="<?php echo $collapse; ?>">
                    <?php
                            
                                while($row=$consulta->fetch(PDO::FETCH_ASSOC)){ 
//                                    $fechaactual2= date("d/m/Y");
                                    $tipo=$row['tiposeccion'];
                                    $titulo= utf8_decode($row['nombre']);
                                    $id=$row['idsecciones'];
                                    $fechafin=$row['fecha_fin'];
                                    $finicio=$row['fecha_inicio'];
                                    $estatus2=$row['status'];
                                    $id= mainModel::encryption($id);
                                    $tipo= mainModel::encryption($tipo);
                                    
                                    $separa = explode('/',$finicio);
                                    $dia = $separa[0];
                                    $mes = $separa[1];
                                    $anio = $separa[2];
                                    
                                    $ffsepara = explode('/',$fechafin);
                                    $diaf = $ffsepara[0];
                                    $mesf = $ffsepara[1];
                                    $aniof = $ffsepara[2];
                                    
                                  if($dia<=$diaact AND $mes<=$mesact AND $anio<=$anioact){  
                                                                    
                                        if($estatus2==1){//if estatus2
                                            if($diaf>=$diaact AND $mesf>=$mesact AND $aniof>=$anioact){
                        ?>
                        <a href="http://10.11.24.69/secciones/vistageneral/<?php echo $id;?>/<?php echo $tipo; ?>" class="list-group-item"><?php echo $titulo; ?></a>
                        <?php
                                            }
                                        }//if
                                    }
                                }//while 
                               
                              $i++;
                        ?>
                    </li>
                <?php
                               }//is estatus1
//                              }
                            }
                    }//for 2
                ?>
                    <!--<li class="list-group-item"><a href="http://10.11.24.69/contenido/" target="_blank"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Acceder</a></li>-->
                </ul>
          </div>
            <div class="col-xs-12 col-sm-9 content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Ocultar/Mostrar Menu"></span></a>Ocultar / Mostrar Menu</h3>
                    </div>
                    <div class="panel-body">
                        <div class="content-row">
                            <?php require_once $vistasR; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
        <?php          
        endif; 
        ?>
</body>
</html>