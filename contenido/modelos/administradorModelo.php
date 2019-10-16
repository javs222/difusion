<?php
    if($peticionAjax){
         require_once "../nucleo/mainModel.php";
     }else {
         require_once "./nucleo/mainModel.php";
     }
     
     class administradorModelo extends mainModel{
         protected function agregar_administrador_modelo($datos){
             $sql= mainModel::conectar()->prepare("INSERT INTO usuarios(nombre,apellido_paterno,apellido_materno,puesto,cdcuenta) "
                     . "VALUES(:nombre,:ap_paterno,:ap_materno,:area,:codigo)");
             
             
             $sql->bindParam(":nombre", $datos['nombre']);
             $sql->bindParam(":ap_paterno", $datos['ap_paterno']);
             $sql->bindParam(":ap_materno", $datos['ap_materno']);
             $sql->bindParam(":area", $datos['area']);
             $sql->bindParam(":codigo", $datos['codigo']);
             $sql->execute();
//             print_r($sql->errorInfo());
             return $sql;
         }
         
         protected function actualizar_usuario_modelo($datos){
             $sql= mainModel::conectar()->prepare("UPDATE usuario SET nombre=:nombre,appellido_paterno=:ap_paterno,appellido_materno=:ap_materno,puesto=:area WHERE cdcuenta=:codigo");
             
             
             $sql->bindParam(":nombre", $datos['nombre']);
             $sql->bindParam(":ap_paterno", $datos['ap_paterno']);
             $sql->bindParam(":ap_materno", $datos['ap_materno']);
             $sql->bindParam(":area", $datos['area']);
             $sql->bindParam(":codigo", $datos['codigo']);
             $sql->execute();
//             print_r($sql->errorInfo());
             return $sql;
         }
         
         protected function datos_administrador_modelo($tipo,$id){
             if($tipo=="unico"){
                 
                 $query= mainModel::conectar()->prepare("SELECT
                                                                secciones.nombre,
                                                                contenidos.text,
                                                                contenidos.link,
                                                                contenidos.archivo,
                                                                contenidos.pdf_imagen,
                                                                contenidos.tipo,
                                                                contenidos.fecha_inicio,
                                                                contenidos.fecha_fin
                                                                FROM
                                                                secciones
                                                                INNER JOIN contenidos ON contenidos.idsecciones = secciones.idsecciones
                                                                WHERE
                                                                secciones.idsecciones = '$id'");
//                 $query->bindParam(":codigo", $codigo);
             }
             $query->execute();
             return $query;
         }
         
         protected function datos_actualizar_modelo($tipo,$volante){
             if($tipo=="unico"){
                 
                 $query= mainModel::conectar()->prepare("SELECT                                                 
                                                                recepciones.fecha_oficio,
                                                                recepciones.asunto,
                                                                recepciones.prosedencia,
                                                                recepciones.nombre_prosedencia,
                                                                recepciones.fecha_recibido,
                                                                recepciones.hora,
                                                                recepciones.n_oficio,
                                                                recepciones.volante,
                                                                recepciones.archivo
                                                                FROM
                                                                recepciones
                                                                WHERE
                                                                recepciones.volante = '$volante' ");
//                 $query->bindParam(":codigo", $codigo);
             }
             $query->execute();
             return $query;
         }
         
          protected function notificacionesmodelo($datos){
                 
            $query= mainModel::conectar()->prepare("UPDATE atenderbitacora SET leido=:leido WHERE abcodigo=:abcodigo");
            $query->bindParam(":leido",$datos['leido']);
            $query->bindParam(":abcodigo",$datos['abcodigo']);
            $query->execute();
//            return $query;
         }
         
     }