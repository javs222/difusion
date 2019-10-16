<?php

if($peticionAjax){
     require_once "../nucleo/mainModel.php";
    }else {
    require_once "./nucleo/mainModel.php";
}
class recuperarModelo extends mainModel{    
    protected function recuperar_contraseña_modelo($nombre){
//    $codigo=  mainModel::decryption($codigo);
    
    $query=mainModel::conectar()->prepare("SELECT
                                                    cuentas.clave
                                                    FROM
                                                    cuentas
                                                    WHERE
                                                    cuentas.usuario = '$nombre'");

            
            $query->execute();
            $contador=$query->rowCount();
            $html="";
            
        if($contador==1)
        {    
            while($row = $query->fetch(PDO::FETCH_ASSOC))
            {   
//                $nombre=$row['nombre'];
//                $text=$row['text'];
//                $tipo=$row['tipo_seccion'];
                
//                $datos=[
//                    "tipo"=>$tipo
//                ];
                $contrasenia=$row['clave'];
                $contrasenia=  mainModel::decryption($contrasenia);
                $html.= "<input class='form-control' type='text' value='".$contrasenia."' disabled>";
            }
//            return $dato_json   = json_encode($datos);
            return $contrasenia;
        }  else {
            $contrasenia="FALSE";
            return $contrasenia;
        }
    }
}