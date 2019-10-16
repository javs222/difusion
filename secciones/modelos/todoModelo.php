<?php

if($peticionAjax){
     require_once "./nucleo/mainModel.php";
//    require_once '../nucleo/conexion.php';
    }else {
    require_once "../nucleo/mainModel.php";
//    require_once './nucleo/conexion.php';
}
class todoModelo{
    protected function todo_modelo(){
    
    
    $query=mainModel::conectar2()->prepare("SELECT
                                                    secciones.nombre,
                                                    tiposecciones.tiposeccion,
                                                    contenidos.fecha_inicio,
                                                    contenidos.fecha_fin AS fechafin,
                                                    contenidos.idsecciones
                                                    FROM
                                                    secciones
                                                    INNER JOIN tiposecciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones
                                                    INNER JOIN contenidos ON secciones.idsecciones = contenidos.idsecciones
                                                    ORDER BY
                                                    contenidos.idsecciones ASC");
            $query->execute();
            return $query;      
    }
}