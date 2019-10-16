<div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i><a href="<?php echo SERVERURL;?>index"><b>Subdirección de Desarrollo Organizacional</b></a></li>
                <?php
                    require_once "./controladores/httpushControlador.php";//// hacer tres consultas por separado para regresar la información aqui
                    $instancia= new httpushControlador();
                    $finanzas= $instancia->actualizar_httpush();
                    
                    require_once "./controladores/sacmexControlador.php";
                    $instancia2= new sacmexControlador();
                    $sacmex= $instancia2->sacmex();
                    
                    require_once "./controladores/generalControlador.php";
                    $instancia3= new generalControlador();
                    $general= $instancia3->general();
                ?>
                <li>
                  <a href="#demo1" class="list-group-item " data-toggle="collapse">FINANZAS  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo1">
                       <?php   while($row = $finanzas->fetch(PDO::FETCH_ASSOC)){
                                    $fechaactual= date("d/m/Y");
                                    $tipo=$row['tiposeccion'];
                                    $titulo=$row['nombre'];
                                    $id=$row['idsecciones'];
                                    $fechafin=$row['fechafin'];
//                                    $id= mainModel::encryption($id);
//                        if($finicio<=$fechaactual){
     
                            if($fechafin>=$fechaactual){      
                                    
                              if($tipo=="FINANZAS"){ 
                        
                        ?>
                        <a href="http://10.11.24.69/secciones/vistageneral/<?php echo $id;?>/<?php echo $tipo; ?>" class="list-group-item"><?php echo $titulo;?></a>
                        <?php   } 
                              }
                            }
                        ?>
                    </li>
                </li>
                <li>
                    <a href="#demo3" class="list-group-item " data-toggle="collapse">GENERAL  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo3">
                        <?php   while($row = $general->fetch(PDO::FETCH_ASSOC)){ 
                                    $tipo=$row['tiposeccion'];
                                    $titulo=$row['nombre'];
                                    $id=$row['idsecciones'];
                                    $fechafin=$row['fechafin'];
                                    $fechaactual= date("d/m/Y");
//                                    print_r($titulo);
//                                    print_r($tipo);
                        if($fechafin>=$fechaactual){
                         if($tipo=="GENERAL"){ 
                        ?>
                        <a href="http://10.11.24.69/secciones/vistageneral/<?php echo $id;?>/<?php echo $tipo; ?>" class="list-group-item"><?php echo $titulo;?></a>
                        <?php }
                            }
                          }
                        ?>
                    </li>
                </li>
                <li>
                    <a href="#demo2" class="list-group-item " data-toggle="collapse">SACMEX  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo2">
                        <?php   while($row = $sacmex->fetch(PDO::FETCH_ASSOC)){ 
                                    $tipo=$row['tiposeccion'];
                                    $titulo=$row['nombre'];
                                    $id=$row['idsecciones'];
                                    $fechafin=$row['fechafin'];
                                    $fechaactual= date("d/m/Y");
//                                    print_r($titulo);
//                                    print_r($tipo);
                        if($fechafin>=$fechaactual){
                         if($tipo=="SACMEX"){ 
                        ?>
                        <a href="http://10.11.24.69/secciones/vistageneral/<?php echo $id;?>/<?php echo $tipo;?>" class="list-group-item"><?php echo $titulo;?></a>
                        <?php }
                             }
                           }
                        ?>
                    </li>
                </li>
<!--                <li class="list-group-item"><a href="http://10.11.24.236/contenido/" target="_blank"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Acceder</a></li>-->
              </ul>
              <li class="list-group-item"><a href="http://10.11.24.69/contenido/" target="_blank"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Acceder</a></li>
          </div>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Ocultar/Mostrar Menu"></span></a>Ocultar / Mostrar Menu</h3>
              </div>
                <div class="panel-body">
                <div class="content-row">
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>