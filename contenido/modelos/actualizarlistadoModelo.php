<?php
    if($peticionAjax){
         require_once "../nucleo/mainModel.php";
     }else {
         require_once "./nucleo/mainModel.php";
     }
     
     class actualizarlistadoModelo extends mainModel{
         
          protected function datos_actualizar_listado_administrador_modelo($datos){
                 
            $query= mainModel::conectar()->prepare("UPDATE atenderbitacora SET leido=:leido WHERE abcodigo=:abcodigo");
            $query->bindParam(":leido",$datos['leido']);
            $query->bindParam(":abcodigo",$datos['abcodigo']);
            $query->execute();
            return $query;
         }
         
         protected function actualizar_usuario_modelo($datos){
             $sql= mainModel::conectar()->prepare("UPDATE usuarios SET nombre=:nombre,apellido_paterno=:ap_paterno,apellido_materno=:ap_materno,puesto=:area WHERE cdcuenta=:codigo");
             
             
             $sql->bindParam(":nombre", $datos['nombre']);
             $sql->bindParam(":ap_paterno", $datos['ap_paterno']);
             $sql->bindParam(":ap_materno", $datos['ap_materno']);
             $sql->bindParam(":area", $datos['area']);
             $sql->bindParam(":codigo", $datos['codigo']);
             $sql->execute();
//             print_r($sql->errorInfo());
             return $sql;
         }
         
     }