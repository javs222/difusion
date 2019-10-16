<?php

if($peticionAjax){
     require_once "./nucleo/mainModel.php";
//    require_once '../nucleo/conexion.php';
    }else {
    require_once "../nucleo/mainModel.php";
//    require_once './nucleo/conexion.php';
}
class contadorModelo{
    protected function contador_modelo(){
    
    
    $query=mainModel::conectar2()->prepare("SELECT
                                                    Count(tiposecciones.idtiposecciones),
                                                    tiposecciones.tiposeccion,
                                                    secciones.nombre
                                                    FROM
                                                    secciones
                                                    INNER JOIN tiposecciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones
                                                    GROUP BY
                                                    tiposecciones.tiposeccion");
            $query->execute();
            $contador=$query->rowCount();
//            while($row = $query->fetch(PDO::FETCH_ASSOC)){
//                $tipo=$row['tiposeccion'];
////            }
//            
//                $datos=[
//                    "contador"=>$contador,
//                    "tipo"=>$tipo
//                ];
//            }
                
            return $contador;      
    }
}