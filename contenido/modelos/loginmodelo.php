<?php
if($peticionAjax){
         require_once "../nucleo/mainModel.php";
    }else 
        {
         require_once "./nucleo/mainModel.php";
    }
    class loginModelo extends mainModel{
        protected function iniciar_sesion_modelo($datos){
            $sql= mainModel::conectar()->prepare("SELECT * FROM cuentas WHERE usuario=:usuario AND clave=:clave AND cuentas.estatus = '1'");
            $sql->bindParam(":usuario",$datos['usuario']);
            $sql->bindParam(":clave",$datos['clave']);
            $sql->execute();
//            print_r($sql->errorInfo());
//            print_r($sql);
            return $sql;
        }        
        protected function cerrar_sesion_modelo($datos){
            if($datos['usuario']!="" && $datos['token_s']==$datos['token'])
            {
                $abitacora= mainModel::actualizar_bitacora($datos['codigo'],$datos['hora']);
                if ($abitacora->rowCount()==1){
                    session_unset();
                    session_destroy();
                    $respuesta="TRUE";
                } else {
                    $respuesta="FALSE";
                }
            } else {
                $respuesta="FALSE";
            }
            return $respuesta;
        }        
        protected function actualizar_documento_modelo($datos){
            if($datos['volante']!="" && $datos['tramite']!="")
            {
                $abitacora= mainModel::actualizar_recepcion($datos['volante'],$datos['tramite']);
                if ($abitacora->rowCount()==1){
//                    session_unset();
//                    session_destroy();
                    $respuesta="TRUE";
                } else {
                    $respuesta="FALSE";
                }
            } else {
                $respuesta="FALSE";
            }
            return $respuesta;
        }
    }