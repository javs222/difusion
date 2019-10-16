<?php
if($peticionAjax){
     require_once "../modelos/actualizaradminlistModelo.php";
 }else {
     require_once "./modelos/actualizaradminlistModelo.php";
 }
 //contralador para agregar administrador
 class adminlistadoControlador extends adminlistadoModelo
 {
      public function datos_actualizar_listado_administrador_controlador($tipo,$cdcuenta){
//            $codigo= mainModel::decryption($codigo);
        $cdcuenta= mainModel::decryption($cdcuenta);
//            $abcodigo=mainModel::decryption($abcodigo);

        return adminlistadoModelo::datos_actualizar_listado_administrador_modelo($tipo,$cdcuenta);
    }
  }