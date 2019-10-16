<?php

if($peticionAjax){
     require_once "./nucleo/mainModel.php";
//    require_once '../nucleo/conexion.php';
    }else {
    require_once "../nucleo/mainModel.php";
//    require_once './nucleo/conexion.php';
}
class generalModelo{
    protected function general_busqueda(){
    
    
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
                                                    tiposecciones.tiposeccion = 'GENERAL'
                                                    ORDER BY
                                                    secciones.idsecciones ASC");
            $query->execute();
            return $query;
    }
}