<?php
if($peticionAjax){
         require_once "../nucleo/mainModel.php";
    }else 
        {
         require_once "./nucleo/mainModel.php";
    }
    class actualizarModelo extends mainModel{
        
        protected function actualizar_modelo($datostitulo){
             $sql= mainModel::conectar()->prepare("UPDATE secciones SET nombre=:nombre WHERE idsecciones=:idseccion");
             
             $sql->bindParam(":nombre",$datostitulo['tituloseccion']);
             $sql->bindParam(":idseccion",$datostitulo['idseccion']);
             $sql->execute();
//             print_r($datostitulo['idseccion']);
//             print_r($sql->errorInfo());
             return $sql;
        
        }
        
        protected function actualizar_modelo2($datostitulo){
             $sql= mainModel::conectar()->prepare("UPDATE secciones SET nombre=:nombre WHERE idsecciones=:idseccion");
             
             $sql->bindParam(":nombre",$datostitulo['tituloseccion']);
             $sql->bindParam(":idseccion",$datostitulo['idseccion']);
             $sql->execute();
//             print_r($datostitulo['idseccion']);
//             print_r($sql->errorInfo());
             return $sql;
        
        }
    }