<?php

if($peticionAjax){
     require_once "./nucleo/mainModel.php";
//    require_once '../nucleo/conexion.php';
    }else {
    require_once "../nucleo/mainModel.php";
//    require_once './nucleo/conexion.php';
}
class vistageneralModelo{
    protected function vista_general_modelo($id,$tipo){
    
    
    $query=mainModel::conectar2()->prepare("SELECT
                                                    secciones.nombre,
                                                    secciones.orden,
                                                    secciones.fecha,
                                                    secciones.hora,
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
                                                    contenidos.idsecciones = '$id'");
//            usleep(1);//anteriormente 10000
            $query->execute();
//            print_r($id);
//            print_r($query->errorInfo());
            return $query;
//            $rows = $query->fetchAll(PDO::FETCH_OBJ);
//            $datos = array(); //creamos un array
//            while($row = $query->fetch(PDO::FETCH_ASSOC))
//            {  
//                $nombre=$row['nombre'];
//                $tipo=$row['tipo_seccion'];
//                $orden=$row['orden'];
//                $fecha=$row['fecha'];
//                $hora=$row['hora'];
//                $texto=$row['text'];
//                $link=$row['link'];
//                $archivo=$row['archivo'];
//                $pdfimagen=$row['pdf_imagen'];
//                $tipoarchivo=$row['tipo'];
//                $fechainicio=$row['fecha_inicio'];
//                $fechafinal=$row['fecha_fin'];  
                
//                $datos=
//                [
//                    "nombre"=>$nombre,
//                    "texto"=>$texto,
//                    "tipo"=>$tipo
//                ];
                
//                $datos[] = array('nombre'=> $nombre, 'tipo_seccion'=> $tipo, 'orden'=> $orden, 'fecha'=> $fecha,
//                        'hora'=> $hora, 'text'=> $texto, 'link'=> $link,'pdf_imagen'=> $pdfimagen,'fecha_inicio'=> $fechainicio,'fecha_fin'=> $fechafinal);
//                $jsondata["data"]["users"][] = $row;
//            }
            
//            return $dato_json   = json_encode($datos);
        
//        $con = Conectar();
//        $SQL = 'SELECT
//                                                    secciones.nombre,
//                                                    secciones.tipo_seccion,
//                                                    secciones.orden,
//                                                    secciones.fecha,
//                                                    secciones.hora,
//                                                    contenidos.text,
//                                                    contenidos.link,
//                                                    contenidos.archivo,
//                                                    contenidos.tipo,
//                                                    contenidos.fecha_inicio,
//                                                    contenidos.fecha_fin
//                                                    FROM
//                                                    secciones
//                                                    INNER JOIN contenidos ON contenidos.cdsecciones = secciones.cdsecciones';
//        $stmt = $con->prepare($SQL);
//        $result = $stmt->execute();
//        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        return $dato_json=json_encode($rows);
        
    }
}