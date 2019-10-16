<?php
if($peticionAjax){
     require_once "../nucleo/mainModel.php";
    }else {
    require_once "./nucleo/mainModel.php";
}
class eliminarModelo extends mainModel{    
    protected function eliminar_cuenta_modelo($cuenta){
//        $cuenta=mainModel::decryption($cuenta);
        
        $datos=[
            "cuenta"=>$cuenta
        ];
        
        $desactivar=mainModel::eliminar_cuenta_usuario($datos);
//        $eliminar=mainModel::eliminar_usuario($datos);
//        print_r($nomtitulo);
//        print_r($idtiposeccion);
//        print_r($nomtitulo);
//        print_r($desactivar);
        if($desactivar->rowCount()>=1){
            $respuesta="TRUE";
        }else{
            $respuesta="FALSE";
        }
        return $respuesta;
    }
}