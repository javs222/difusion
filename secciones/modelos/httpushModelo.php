<?php

if($peticionAjax){
     require_once "./nucleo/mainModel.php";
//    require_once '../nucleo/conexion.php';
    }else {
    require_once "../nucleo/mainModel.php";
//    require_once './nucleo/conexion.php';
}
class httpushModelo{
    protected function httpush_modelo(){
    
    
    $query=mainModel::conectar2()->prepare("SELECT
                                                    Max(contenidos.fecha_fin) AS fechafin,
                                                    secciones.nombre,
                                                    secciones.orden,
                                                    secciones.idtiposecciones,
                                                    secciones.fecha,
                                                    secciones.hora,
                                                    tiposecciones.tiposeccion,
                                                    secciones.idsecciones
                                                    FROM
                                                    contenidos
                                                    INNER JOIN secciones ON contenidos.idsecciones = secciones.idsecciones
                                                    INNER JOIN tiposecciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones
                                                    WHERE
                                                    tiposecciones.tiposeccion = 'FINANZAS'
                                                    ORDER BY
                                                    secciones.idsecciones ASC");
            $query->execute();
            return $query;
      
        
//     $consulta="SELECT
//                                                    secciones.nombre,
//                                                    secciones.tipo_seccion,
//                                                    secciones.orden,
//                                                    secciones.fecha,
//                                                    secciones.hora,
//                                                    secciones.cdsecciones
//                                                    FROM
//                                                    secciones
//                                                    WHERE
//                                                    secciones.tipo_seccion = 'Finanzas'";
//     
//    $conexion= mainModel::conectar2();
//             
//             $datos= $conexion->query($consulta);
//             
////             $datos= $datos->fetchAll();
////             
////             $total= $conexion->query("SELECT FOUND_ROWS()");
////             $total= (int)$total->fetchColumn();
//    
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
//             $fechaactual= date("d/m/Y");
//    $html="";
//    ////////////////////////////////////////////////////////<!--style='display: none;'-->
////    if($datos->rowCount()>=1){
//        /////$row = $query->fetch(PDO::FETCH_ASSOC)
//    
////        foreach ($datos as $row){
////            $titulo = $row['nombre'];
////            $texto = $row['text'];
////            $link = $row['link'];
////            $pdf_imagen = $row['pdf_imagen'];
////            $idcon=$row['idcontenidos'];
////            $finicio=$row['fecha_inicio'];
////            $final=$row['fecha_fin'];
//            
//            
////        }//for    
////for($a=1;$a<=$total;$a++){  
//// if($finicio<=$fechaactual){
////     
////     if($final>=$fechaactual){               
//$html.=" <a href='#demo1' class='list-group-item' data-toggle='collapse'>FINANZAS  <span class='glyphicon glyphicon-chevron-right'></span></a>
//            <li class=collapse' id='demo1'>";
//                foreach ($datos as $row){ 
//                            $tipo=$row['tipo_seccion'];
//                            $titulo=$row['nombre'];
//                            $id=$row['cdsecciones'];
////                                    $id= mainModel::encryption($id);
//
//                 if($tipo=="Finanzas"){
//    $html.="    <a href='http://10.11.24.69/secciones/vistageneral/$id/$tipo' class='list-group-item'>$titulo</a>";
//                 } 
//                }
//    $html.="</li>";
////    }
//// }
//    
////     }
////          }//foreach
//          
////        }  else {
////               echo "No existe información";
////        }
//    
//    
//    return $html;
      
    }
}