<?php
    if($peticionAjax){
         require_once "../modelos/contraseniaModelo.php";
     }else {
         require_once "./modelos/contraseniaModelo.php";
     }
     //contralador para agregar administrador
     class contraseniaControlador extends contraseniaModelo{
         public function actualizar_contrasenia_controlador(){
//             $actual=mainModel::limpiar_cadena($_POST['actual']);
             $password= mainModel::limpiar_cadena($_POST['contrasenia']);
             $password2= mainModel::limpiar_cadena($_POST['contrasenia2']);
             $usuario= mainModel::limpiar_cadena($_POST['nombreusuario']);
             $codigo=$_GET['token'];
//             $codigo=$_POST[$codigo];
//             $codigo=$_POST[''];
//             $codigo=$codigo;
//        print_r($_SESSION['cdcuenta_ssc']);
             
            if($password === "")
            {
                $alerta = [
                   "Alerta"=>"simple",
                   "Titulo"=>"Ocurrio un error inisperado",
                   "Texto"=>"El campo contraseña esta vacío",
                   "Tipo"=>"error"
                ];
            }else
            {
                if($password2 === "")
                {
                    $alerta = [
                       "Alerta"=>"simple",
                       "Titulo"=>"Ocurrio un error inisperado",
                       "Texto"=>"El campo repetir contraseña esta vacío",
                       "Tipo"=>"error"
                    ];
                }else
                {
                  if($password!= $password2)
                    {
                        $alerta = [
                          "Alerta"=>"simple",
                          "Titulo"=>"Ocurrio un error inisperado",
                          "Texto"=>"Las contraseñas que acabas de ingresar no coinciden, porfavor intenta nuevamente",
                          "Tipo"=>"error"
                        ];
                    }else
                    {
                        if($usuario === "")
                        {
                            $alerta = [
                              "Alerta"=>"simple",
                              "Titulo"=>"Ocurrio un error inisperado",
                              "Texto"=>"El campo usuario esta vacío",
                              "Tipo"=>"error"
                            ];
                        }else
                        {
//                        $consulta2= mainModel::ejecutar_consulta_simple("SELECT * FROM cuentas WHERE cdcuenta='$_SESSION['cdcuenta_ssc']'");
                        
                            $password= mainModel::encryption($password);
//                            $actual= mainModel::encryption($actual);

                            $datausuario=[
                                "clave"=>$password,
                                "usuario"=>$usuario
                            ];
                                $guardarusuario= contraseniaModelo::actualizar_contrasenia_modelo($datausuario);
                                
                            if($guardarusuario->rowCount()>=1)
                            {
                               $alerta = [
                                   "Alerta"=>"limpiar",
                                   "Titulo"=>"Actualizado",
                                   "Texto"=>"La contraseña se actualizo correctamente",
                                   "Tipo"=>"success"
                                ];
                            }else
                            {
//                                        mainModel::eliminar_cuenta($codigo);
                                $alerta = [
                                   "Alerta"=>"simple",
                                   "Titulo"=>"Ocurrio un error inisperado",
                                   "Texto"=>"No hemos podido actualizar la contraseña",
                                   "Tipo"=>"error"
                                ];

                            }
                        }
                    }
                }
            }/**/
             return mainModel::sweet_alert($alerta);
         }
         
     }