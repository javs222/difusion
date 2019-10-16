<?php
    if($peticionAjax){
         require_once "../nucleo/mainModel.php";
     }else {
         require_once "./nucleo/mainModel.php";
     }
     
     class contraseniaModelo extends mainModel{
         protected function actualizar_contrasenia_modelo($datos){
             $codigo=$_GET['token'];
             $sql= mainModel::conectar()->prepare("UPDATE cuentas SET clave=:clave WHERE usuario=:usuario");
             
             $sql->bindParam(":clave", $datos['clave']);
             $sql->bindParam(":usuario", $datos['usuario']);
             //$sql->bindParam(":actual", $datos['actual']);
             //$sql->bindParam(":codigo", $datos['codigo']);
//             $sql->bindParam(":ap_paterno", $datos['ap_paterno']);
//             $sql->bindParam(":ap_materno", $datos['ap_materno']);
//             $sql->bindParam(":area", $datos['area']);
             $sql->execute();
//             print_r($sql->errorInfo());
        //print_r($datos['clave']);
             return $sql;
         }
     }