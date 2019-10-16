<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Subdirección de Desarrollo Organizacional</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="dist/js/site.min.js"></script>
  </head>
  <body>
    <script type="text/javascript">
        $(document).ready(function() {
            function changeNumber() {
                //var token = '<?ph //echo $codigo ?>'?token='+token;
                $.ajax
                ({
                    sync:  false, 
                    type: "POST",
                    Type:"html",
                    url: 'http://10.11.24.69/secciones/ajax/setintervalAjax.php',
                    success: function(data) 
                    {
                        
                        
                        var datos        = eval("(" + data + ")");
                        var titulo          = datos.nombre;
                        var texto          = datos.texto;
                        var tipo          = datos.tipo_seccion;
//                        $('#titulo').text(titulo);
                        document.cookie ='variable='+tipo+';';
//                        document.cookie ='viriable='+titulo+';';
//                        $.get('', {variable: tipo});
                        //window.location="atender=" + atender + "estatus=" + estatus;
                        //$('#atender').text(atender);
//                        console.log(data);

                    }
                });
            }
            setInterval(changeNumber, 500);
        });
    </script>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>Subdirección de Desarrollo Organizacional</b></li>
                <?php
                    require_once "./controladores/httpushControlador.php";
                    $instancia= new httpushControlador();
                    $finanzas= $instancia->actualizar_httpush();
                    
                    require_once "./controladores/sacmexControlador.php";
                    $instancia= new sacmexControlador();
                    $sacmex= $instancia->sacmex();
                    
                    require_once "./controladores/generalControlador.php";
                    $instancia= new generalControlador();
                    $general= $instancia->general();
                ?>
                <?php
//                    $misDatosJSON = json_decode($_POST["datos"]);
//                $tipo = "<script type='text/javascript'> document.write('tipo') </script>";
//                    $tipo=$_COOKIE['variable'];
//                    print_r($tipo); 
                ?>
                <li>
                  <a href="#demo1" class="list-group-item " data-toggle="collapse">FINANZAS  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo1">
                        <?php   while($row = $finanzas->fetch(PDO::FETCH_ASSOC)){ 
                                    $tipo=$row['tipo_seccion'];
                                    $titulo=$row['nombre'];
                        ?>
                        <?php if($tipo=="Finanzas"){ ?>
                        <a href="#vistageneral" class="list-group-item"><?php echo $titulo; ?></a>
                        <?php } 
                            }
                        ?>
                    </li>
                </li>
                <li>
                    <a href="#demo2" class="list-group-item " data-toggle="collapse">SACMEX  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo2">
                        <?php   while($row = $sacmex->fetch(PDO::FETCH_ASSOC)){ 
                                    $tipo=$row['tipo_seccion'];
                                    $titulo=$row['nombre'];
//                                    print_r($titulo);
//                                    print_r($tipo);
                        ?>
                        <?php if($tipo=="Sacmex"){ ?>
                        <a href="" class="list-group-item" id="titulo"><?php echo $titulo; ?></a>
                        <?php } 
                             }
                        ?>
                    </li>
                </li>
                <li>
                    <a href="#demo3" class="list-group-item " data-toggle="collapse">GENERAL  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo3">
                        <?php   while($row = $general->fetch(PDO::FETCH_ASSOC)){ 
                                    $tipo=$row['tipo_seccion'];
                                    $titulo=$row['nombre'];
//                                    print_r($titulo);
//                                    print_r($tipo);
                        ?>
                        <?php if($tipo=="General"){ ?>
                        <a href="" class="list-group-item" id="titulo"><?php echo $titulo; ?></a>
                        <?php }
                             }
                        ?>
                    </li>
                </li>
              </ul>
          </div>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Ocultar/Mostrar Menu"></span></a>Ocultar / Mostrar Menu</h3>
              </div>
                <div class="panel-body">
                <div class="content-row">
                </div>
              </div><!-- panel body -->
            </div>
              
        </div><!-- content -->
        
      </div>
    </div>
  </body>
</html>