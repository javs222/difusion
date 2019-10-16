<?php
    if($peticionAjax){
         require_once "../nucleo/mainModel.php";
     }else {
         require_once "./nucleo/mainModel.php";
     }
     
     class adminlistadoModelo extends mainModel{
//         protected function agregar_administrador_modelo($datos){
//             $sql= mainModel::conectar()->prepare("INSERT INTO usuarios(nombre,apellido_paterno,apellido_materno,puesto,cdcuenta) "
//                     . "VALUES(:nombre,:ap_paterno,:ap_materno,:area,:codigo)");
//             
//             
//             $sql->bindParam(":nombre", $datos['nombre']);
//             $sql->bindParam(":ap_paterno", $datos['ap_paterno']);
//             $sql->bindParam(":ap_materno", $datos['ap_materno']);
//             $sql->bindParam(":area", $datos['area']);
//             $sql->bindParam(":codigo", $datos['codigo']);
//             $sql->execute();
////             print_r($sql->errorInfo());
//             return $sql;
//         }
         
//         protected function datos_administrador_modelo($tipo,$id){
//             if($tipo=="unico"){
//                 
//                 $query= mainModel::conectar()->prepare("SELECT
//                                                                secciones.nombre,
//                                                                contenidos.text,
//                                                                contenidos.link,
//                                                                contenidos.archivo,
//                                                                contenidos.pdf_imagen,
//                                                                contenidos.tipo,
//                                                                contenidos.fecha_inicio,
//                                                                contenidos.fecha_fin
//                                                                FROM
//                                                                secciones
//                                                                INNER JOIN contenidos ON contenidos.idsecciones = secciones.idsecciones
//                                                                WHERE
//                                                                secciones.idsecciones = '$id'");
////                 $query->bindParam(":codigo", $codigo);
//             }
//             $query->execute();
//             return $query;
//         }
         
         protected function datos_actualizar_listado_administrador_modelo($tipo,$cdcuenta){
             if($tipo=="unico"){
                 
                 $query= mainModel::conectar()->prepare("SELECT 
                                                                cuentas.cdcuenta,
                                                                cuentas.usuario,
                                                                cuentas.clave,
                                                                cuentas.privilegio,
                                                                cuentas.nombre,
                                                                cuentas.apellido_paterno,
                                                                cuentas.apellido_materno,
                                                                cuentas.puesto
                                                                FROM
                                                                cuentas
                                                                WHERE
                                                                cuentas.cdcuenta = '$cdcuenta'");
//                 $query->bindParam(":codigo", $codigo);
             }
             $query->execute();
             return $query;
         }
         
//          protected function notificacionesmodelo($datos){
//                 
//            $query= mainModel::conectar()->prepare("UPDATE atenderbitacora SET leido=:leido WHERE abcodigo=:abcodigo");
//            $query->bindParam(":leido",$datos['leido']);
//            $query->bindParam(":abcodigo",$datos['abcodigo']);
//            $query->execute();
////            return $query;
//         }
         
     }