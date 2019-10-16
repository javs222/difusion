<?php

if($peticionAjax){
     require_once "../nucleo/mainModel.php";
    }else {
    require_once "./nucleo/mainModel.php";
}
class httpushModelo extends mainModel{
    protected function httpush_modelo(){
    
    
    $query=mainModel::conectar()->prepare("SELECT
                                                    secciones.nombre,
                                                    secciones.tipo_seccion,
                                                    secciones.orden,
                                                    secciones.fecha,
                                                    secciones.hora,
                                                    contenidos.text,
                                                    contenidos.link,
                                                    contenidos.archivo,
                                                    contenidos.pdf_imagen,
                                                    contenidos.tipo,
                                                    contenidos.fecha_inicio,
                                                    contenidos.fecha_fin
                                                    FROM
                                                    secciones
                                                    INNER JOIN contenidos ON contenidos.cdsecciones = secciones.cdsecciones");

            
            $query->execute();
            while($row = $query->fetch(PDO::FETCH_ASSOC))
            {   
                $nombre=$row['nombre'];
                $text=$row['text'];
                
                $datos=
                [
                    "nombre"=>$nombre,
                    "texto"=>$text
                ];
            }
            return $dato_json   = json_encode($datos);
    }
    
    protected function seleccionar($codigo){
//    $codigo=  mainModel::decryption($codigo);
    
    $query=mainModel::conectar()->prepare("SELECT
                                                    tiposecciones.tiposeccion 
                                                    FROM
                                                    tiposecciones
                                                    WHERE
                                                    tiposecciones.idtiposecciones = '$codigo'");

            
            $query->execute();
            $html="";
//        if($codigo===""){    
//            $html="FALSE";
//        }  else {
            while($row = $query->fetch(PDO::FETCH_ASSOC))
            {   
//                $nombre=$row['nombre'];
//                $text=$row['text'];
//                $tipo=$row['tipo_seccion'];
                
//                $datos=[
//                    "tipo"=>$tipo
//                ];
                $html.= "<label style='font-size: 20px;' class='text-info'>Asignado al menú:</label>"
                        . "<input class='form-control' type='text' value='".$row['tiposeccion']."' disabled>";
            }
//        }
//            return $dato_json   = json_encode($datos);
        return $html;
    }
}