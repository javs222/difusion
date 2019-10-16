<?php

if($peticionAjax){
     require_once "./nucleo/mainModel.php";
//    require_once '../nucleo/conexion.php';
    }else {
    require_once "../nucleo/mainModel.php";
//    require_once './nucleo/conexion.php';
}
class contadortituloModelo{
    protected function contador_titulo_modelo(){
    
    
    $query=mainModel::conectar2()->prepare("SELECT
                                                    tiposecciones.idtiposecciones,
                                                    tiposecciones.tiposeccion,
                                                    secciones.nombre
                                                    FROM
                                                    tiposecciones
                                                    INNER JOIN secciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones");
            $query->execute();
            $contador=$query->rowCount();
            
            return $contador;      
    }
}