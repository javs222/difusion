<?php
if($peticionAjax){
         require_once "../modelos/loginmodelo.php";
    }else 
        {
         require_once "./modelos/loginmodelo.php";
    }
    
class loginControlador extends loginModelo{
    public function iniciar_sesion_controlador(){
        $usuario= mainModel::limpiar_cadena($_POST['usuario']);
        $clave= mainModel::limpiar_cadena($_POST['clave']);
        
        
            
        if($usuario==="")
        {
            $alerta = [
               "Alerta"=>"simple",
               "Titulo"=>"Oh, No!",
               "Texto"=>"Debes de ingresar una cuenta",
               "Tipo"=>"info"
            ];
        }else
        {
            $consul= mainModel::ejecutar_consulta_simple("SELECT
                                                                cuentas.idcuentas,
                                                                cuentas.cdcuenta,
                                                                cuentas.usuario,
                                                                cuentas.clave,
                                                                cuentas.privilegio,
                                                                cuentas.nombre,
                                                                cuentas.apellido_paterno,
                                                                cuentas.apellido_materno,
                                                                cuentas.puesto,
                                                                cuentas.estatus
                                                                FROM
                                                                cuentas
                                                                WHERE
                                                                cuentas.usuario = '$usuario' AND
                                                                cuentas.estatus = '1'");
        
            while ($row=$consul->fetch(PDO::FETCH_ASSOC))
            {
                $cuenta=$row['usuario'];
                $contrasenia=$row['clave'];
//                print_r($cuenta);
            }
            
            if($usuario!=$cuenta AND $clave==="")
            {
                $alerta = [
                   "Alerta"=>"simple",
                   "Titulo"=>"Oh, No!",
                   "Texto"=>"La cuenta de usuario no existe en el sistema y debes de ingresar una contraseña",
                   "Tipo"=>"info"
                ];
            }else
            {
                $consul2= mainModel::ejecutar_consulta_simple("SELECT
                                                                        cuentas.idcuentas,
                                                                        cuentas.cdcuenta,
                                                                        cuentas.usuario,
                                                                        cuentas.clave,
                                                                        cuentas.privilegio,
                                                                        cuentas.nombre,
                                                                        cuentas.apellido_paterno,
                                                                        cuentas.apellido_materno,
                                                                        cuentas.puesto,
                                                                        cuentas.estatus
                                                                        FROM
                                                                        cuentas
                                                                        WHERE
                                                                        cuentas.usuario = '$usuario' AND
                                                                        cuentas.estatus = '1'");
        
                    while ($row=$consul2->fetch(PDO::FETCH_ASSOC))
                    {
                        $cuenta=$row['usuario'];
                        $contrasenia=$row['clave'];
        //                print_r($cuenta);
                    }
                if($usuario===$cuenta AND $clave==="")
                {
                    $alerta = [
                       "Alerta"=>"simple",
                       "Titulo"=>"Oh, No!",
                       "Texto"=>"La cuenta de usuario es correcta, pero debes de ingresar una contraseña",
                       "Tipo"=>"info"
                    ];
                }else
                {
                    $consul3= mainModel::ejecutar_consulta_simple("SELECT
                                                                cuentas.idcuentas,
                                                                cuentas.cdcuenta,
                                                                cuentas.usuario,
                                                                cuentas.clave,
                                                                cuentas.privilegio,
                                                                cuentas.nombre,
                                                                cuentas.apellido_paterno,
                                                                cuentas.apellido_materno,
                                                                cuentas.puesto,
                                                                cuentas.estatus
                                                                FROM
                                                                cuentas
                                                                WHERE
                                                                cuentas.usuario = '$usuario' AND
                                                                cuentas.estatus = '1'");
        
                        while ($row=$consul3->fetch(PDO::FETCH_ASSOC))
                        {
                            $cuenta=$row['usuario'];
                            $contrasenia=$row['clave'];
            //                print_r($cuenta);
                        }
                    $clave= mainModel::encryption($clave);
                    if($usuario===$cuenta AND $clave!=$contrasenia)
                    {
                        $alerta = [
                           "Alerta"=>"simple",
                           "Titulo"=>"Oh, No!",
                           "Texto"=>"La cuenta de usuario es correcta, pero la contraseña es diferente a la del sistema",
                           "Tipo"=>"info"
                        ];
                    }else
                    {
                        $consul4= mainModel::ejecutar_consulta_simple("SELECT
                                                                cuentas.idcuentas,
                                                                cuentas.cdcuenta,
                                                                cuentas.usuario,
                                                                cuentas.clave,
                                                                cuentas.privilegio,
                                                                cuentas.nombre,
                                                                cuentas.apellido_paterno,
                                                                cuentas.apellido_materno,
                                                                cuentas.puesto,
                                                                cuentas.estatus
                                                                FROM
                                                                cuentas
                                                                WHERE
                                                                cuentas.usuario = '$usuario' AND
                                                                cuentas.estatus = '1'");
        
                            while ($row=$consul4->fetch(PDO::FETCH_ASSOC))
                            {
                                $cuenta=$row['usuario'];
                                $contrasenia=$row['clave'];
                //                print_r($cuenta);
                            }
                        if($clave!=$contrasenia AND $usuario!=$cuenta)
                        {
                            $alerta = [
                               "Alerta"=>"simple",
                               "Titulo"=>"Oh, No!",
                               "Texto"=>"La contraseña y la cuenta son diferentes a la del sistema",
                               "Tipo"=>"info"
                            ];
                        }else
                        {
                            $consul5= mainModel::ejecutar_consulta_simple("SELECT
                                                                cuentas.idcuentas,
                                                                cuentas.cdcuenta,
                                                                cuentas.usuario,
                                                                cuentas.clave,
                                                                cuentas.privilegio,
                                                                cuentas.nombre,
                                                                cuentas.apellido_paterno,
                                                                cuentas.apellido_materno,
                                                                cuentas.puesto,
                                                                cuentas.estatus
                                                                FROM
                                                                cuentas
                                                                WHERE
                                                                cuentas.usuario = '$usuario' AND
                                                                cuentas.estatus = '1'");
        
                                while ($row=$consul5->fetch(PDO::FETCH_ASSOC))
                                {
                                    $cuenta=$row['usuario'];
                                    $contrasenia=$row['clave'];
                    //                print_r($cuenta);
                                }
                            if($clave===$contrasenia AND $usuario!=$cuenta)
                            {
                                $alerta = [
                                   "Alerta"=>"simple",
                                   "Titulo"=>"Oh, No!",
                                   "Texto"=>"La contraseña es correcta, pero la cuenta de usuario es diferente a la del sistema",
                                   "Tipo"=>"info"
                                ];
//                                print_r($clave);
//                                print_r($usuario);
//                                print_r($cuenta);
                            }else
                            {
                                $datoslogin=[
                                    "usuario"=>$usuario,
                                    "clave"=>$clave
                                ];

                                $datoscuenta= loginModelo::iniciar_sesion_modelo($datoslogin);
                                if($datoscuenta->rowCount()==1)
                                {
                                    $row=$datoscuenta->fetch();

                                    $fechaactual= date("Y-m-d");
                                    $anioactual= date("Y");
                                    $horaactual= date("h:i:s a");

                                    $consulta1= mainModel::ejecutar_consulta_simple("SELECT idbitacora FROM bitacora");

                                    $numero=($consulta1->rowCount())+1;

                                    $codigob= mainModel::generar_codigo_aleatorio("DO",8,$numero);

                                    $datosbitacora=[
                                        "bcodigo"=>$codigob,
                                        "bfecha"=>$fechaactual,
                                        "bhorainicio"=>$horaactual,
                                        "bhorafinal"=>"sin registro",
                                        "btipo"=>$row['privilegio'],
                                        "banio"=>$anioactual,
                                        "cuenta"=>$row['cdcuenta']
                                    ];

                                    $insertarbitacora= mainModel::guardar_bitacora($datosbitacora);
                                    if($insertarbitacora->rowCount()>=1)
                                    {
                                        session_start(['name'=>'SDO']);
                                        $_SESSION['usuario_sdo']=$row['usuario'];
                                        $_SESSION['tipo_sdo']=$row['privilegio'];
                                        $_SESSION['token_sdo']= md5(uniqid(mt_rand(), TRUE));
                                        $_SESSION['cdcuenta_sdo']=$row['cdcuenta'];
                                        $_SESSION['bcodigo_sdo']=$codigob;

                                        if($row['privilegio']=="administrador")
                                        {
                                            $url=SERVERURL."home/";
                                        }else
                                        {
                                            $url=SERVERURL."home/";
                                        }
                                        return $urlLocation='<script> window.location="'.$url.'"</script>';
                                    }else
                                    {
                                        $alerta = [
                                           "Alerta"=>"simple",
                                           "Titulo"=>"Oh, No",
                                           "Texto"=>"No hemos podido iniciar la sesión por problemas técnicos, porfavor intente nuevamente",
                                           "Tipo"=>"warning"
                                        ];
                                    return mainModel::sweet_alert($alerta);
                                    }
                                }else
                                {
                                    $alerta = [
                                       "Alerta"=>"simple",
                                       "Titulo"=>"Oh, No!",
                                       "Texto"=>"El USUARIO y/o la CONTRASEÑA que ingresaste son incorrectos, vuelve a intentarlo",
                                       "Tipo"=>"warning"
                                    ];
                                }
                            }            
                        }
                    }
                } 
            }
        }
            return mainModel::sweet_alert($alerta);
    }
    
    public function cerrar_sesion_controlador(){
            session_start(['name'=>'SDO']);
            $token= mainModel::decryption($_GET['token']);
            
            $hora= date("h:i:s a");
            $datos=[
                "usuario"=>$_SESSION['usuario_sdo'],
                "token_s"=>$_SESSION['token_sdo'],
                "token"=>$token,
                "codigo"=>$_SESSION['bcodigo_sdo'],
                "hora"=>$hora
            ];
            return loginModelo::cerrar_sesion_modelo($datos);
        }

    public function forzar_cierre_sesion_controlador(){
        //session_start();
        session_unset();
        session_destroy();
        return header("location:".SERVERURL."login/");
    }  
}