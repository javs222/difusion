<?php

if($peticionAjax){
     require_once "../nucleo/mainModel2.php";
    require_once '../nucleo/conexion.php';
    }else {
    require_once "./nucleo/mainModel2.php";
    require_once './nucleo/conexion.php';
}
class setintervalModelo{
    protected function setinterval_modelo(){
    
    
//    $query=mainModel::conectar2()->prepare("SELECT
//                                                    secciones.nombre,
//                                                    secciones.tipo_seccion,
//                                                    secciones.orden,
//                                                    secciones.fecha,
//                                                    secciones.hora,
//                                                    contenidos.text,
//                                                    contenidos.link,
//                                                    contenidos.archivo,
//                                                    contenidos.pdf_imagen,
//                                                    contenidos.tipo,
//                                                    contenidos.fecha_inicio,
//                                                    contenidos.fecha_fin
//                                                    FROM
//                                                    secciones
//                                                    INNER JOIN contenidos ON contenidos.cdsecciones = secciones.cdsecciones
//                                                    WHERE
//                                                    secciones.tipo_seccion = 'Finanzas'");
//
//            $query->execute();
//            return $query;
            
//        print_r($query->errorInfo());
        $con = Conectar();
        $SQL = 'SELECT
                                                    secciones.nombre,
                                                    secciones.tipo_seccion,
                                                    secciones.orden,
                                                    secciones.fecha,
                                                    secciones.hora,
                                                    contenidos.text,
                                                    contenidos.link,
                                                    contenidos.archivo,
                                                    contenidos.tipo,
                                                    contenidos.fecha_inicio,
                                                    contenidos.fecha_fin
                                                    FROM
                                                    secciones
                                                    INNER JOIN contenidos ON contenidos.cdsecciones = secciones.cdsecciones';
        $stmt = $con->prepare($SQL);
        $result = $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dato_json=json_encode($rows);
        
    }
}