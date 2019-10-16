<?php

if($peticionAjax){
     require_once "../nucleo/mainModelo.php";
//    require_once '../nucleo/conexion.php';
    }else {
    require_once "./nucleo/mainModelo.php";
//    require_once './nucleo/conexion.php';
}
class showhidenModelo{
    protected function mostrar_ocular_modelo($id,$tipo){
    
//    $conexion= mainModel::conectar2();
    $consulta="SELECT
                        secciones.nombre,
                        secciones.orden,
                        secciones.fecha,
                        secciones.hora,
                        secciones.estatus,
                        contenidos.text,
                        contenidos.link,
                        contenidos.archivo,
                        contenidos.pdf_imagen,
                        contenidos.tipo,
                        contenidos.fecha_inicio,
                        contenidos.fecha_fin,
                        contenidos.idcontenidos,
                        tiposecciones.tiposeccion,
                        contenidos.idsecciones
                        FROM
                        secciones
                        INNER JOIN contenidos ON contenidos.idsecciones = secciones.idsecciones
                        INNER JOIN tiposecciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones
                        WHERE
                        tiposecciones.tiposeccion = '$tipo' AND
                        contenidos.idsecciones = '$id'";
    
    $conexion= mainModel::conectar2();
             
             $datos= $conexion->query($consulta);
             
             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
    
//            $datos=$datos->fetchAll();
//            $cuenta = $datos->rowCount();
//            $total= (int)$total->fetchColumn();
//            $datos = array(); //creamos un array
//            while($row = $query->fetch(PDO::FETCH_ASSOC))
//            {  
//                $array['nombre']=$row['nombre'];
//                $array['texto']=$row['text'];
//                $array['link']=$row['link'];
////                $array['pdfimagen']=$row['pdf_imagen'];
//                $array['finicio']=$row['fecha_inicio'];
//                $array['final']=$row['fecha_fin'];  
//                $array['cdseccion']=$row['cdsecciones'];
//                $array['idcon']=$row['idcontenidos'];
//                
//                array_push($datos,$array);
//            }
//            
//            return $dato_json=json_encode($datos);
//    }
//    print_r($total);
//             $fecha_actual = strtotime(date("d-m-Y"));
//            $fecha_entrada = strtotime("27-09-2019");
            
//             $fechaactual= strtotime(date("d/m/Y"));
            $fechaactual= date("d/m/Y");
             
            $actualsepara = explode('/',$fechaactual);
            $diaact = $actualsepara[0];
            $mesact = $actualsepara[1];
            $anioact = $actualsepara[2];
    $html="";
    ////////////////////////////////////////////////////////<!--style='display: none;'-->
//    if($datos->rowCount()>=1){
        /////$row = $query->fetch(PDO::FETCH_ASSOC)
    
        foreach ($datos as $row){
            $titulo = utf8_decode($row['nombre']);
            $texto = utf8_decode($row['text']);
            $link = $row['link'];
            $pdf_imagen = $row['pdf_imagen'];
            $idcon=$row['idcontenidos'];
            $finicio=$row['fecha_inicio'];
            $final=$row['fecha_fin'];
            $f=$row['fecha_inicio'];
            $estatus=$row['estatus'];
            
            $separa = explode('/',$finicio);
            $dia = $separa[0];
            $mes = $separa[1];
            $anio = $separa[2];

            $ffsepara = explode('/',$final);
            $diaf = $ffsepara[0];
            $mesf = $ffsepara[1];
            $aniof = $ffsepara[2];
            
//        }//for    
//for($a=1;$a<=$total;$a++){  
 if($dia<=$diaact AND $mes<=$mesact AND $anio<=$anioact){
     
     if($estatus==1){   
//if($final >= $fechaactual AND $finicio <= $fechaactual){
$html.="<div id='div1'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <label style='font-family: Source Sans Pro; font-style: SemiBold; font-size: 15px;'>TÍTULO: $titulo</label>
            </div>
        </div>
    <div class='panel-body'>
        <div class='row'>
            <div class='col-md-7'>
                <div class='row>
                    <div class='col-md-6 form-group'>
                        <label class='col-md-2 control-label' for='description' style='font-family: Source Sans Pro; font-style: SemiBold; font-size: 15px;'>Contenido</label>
                        <div class='col-md-10'>
                            <textarea  class='form-control' disabled='' rows='10' cols='20' name='description'>$texto</textarea>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-8 form-group'><br><br>
                        <label class='col-md-2 control-label' style='font-family: Source Sans Pro; font-style: SemiBold; font-size: 15px;' for='description'>Link &nbsp;<span class='glyphicon glyphicon-link'></span></label>";                            
                        if($link==''){
                    $html.="<div class='col-md-4'>
                                <p style='font-family: Source Sans Pro; font-style: SemiBold; font-size: 15px;'>No existe una dirección (Link) para mostrar.</p>
                            </div>";
                        }else{
                            $html.="<div class='col-md-4'>
                                        <p style='font-family: Source Sans Pro; font-style: SemiBold; font-size: 15px;'>Para mayor información click en<a href='$link' target='_blank' rel='external nofollow'>&nbsp;Ver más...</a></p>
                                    </div>";
                            } 
            $html.="</div>
                </div>
                <div class='row'>
                    <div class='col-md-8 form-group'>
                        <label class='col-md-2 control-label' for='description' style='font-family: Source Sans Pro; font-style: SemiBold; font-size: 15px;'>Imagen &nbsp;<span class='glyphicon glyphicon-picture'></span>&nbsp; ó PDF &nbsp;<span class='fa fa-file-pdf-o'></span></label>";
                        if($pdf_imagen==''){
                    $html.="<div class='col-md-4'>
                                <p style='font-family: Source Sans Pro; font-style: SemiBold; font-size: 15px;'>No existe un documento o imagen para mostrar.</p>
                            </div>";
                        }else{
//                                    $id=mainModel::encryption($id);
                            $html.="<div class='col-md-4'>
                                        <p style='font-family: Source Sans Pro; font-style: SemiBold; font-size: 15px;'>Para visualizar la imagen o el pdf click en<a target='_blank' href='".SERVERURL."documento/ver-vistas.php?id=$id&idcon=$idcon' rel='external nofollow'>&nbsp;Ver más...</a></p>
                                    </div>";
                            }
            $html.="</div>
                </div>
            </div>
        </div>
    </div>
    </div>";
    }
 }else {
     $html="<div class='text-info'>
                <p style='font-size: 20px;'>La información estará disponible apartir del: $f</p>
            </div>";
 }//if de fecha inicio
//}
//     }
          }//foreach
          
//        }  else {
//               echo "No existe información";
//        }
    
    
    return $html;
   }  
}