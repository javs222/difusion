<?php
if($peticionAjax){
     require_once "../modelos/actualizarlistadoModelo.php";
 }else {
     require_once "./modelos/actualizarlistadoModelo.php";
 }
 //contralador para agregar administrador
 class actualizarlistadoControlador extends actualizarlistadoModelo
 {
      public function actualizar_listado_controlador(){
            $nombre= mainModel::limpiar_cadena($_POST['nombre']);
            $paterno= mainModel::limpiar_cadena($_POST['ap_paterno']);
            $materno= mainModel::limpiar_cadena($_POST['ap_materno']);
            $area= mainModel::limpiar_cadena($_POST['area']);
             
            $nomusuario= mainModel::limpiar_cadena($_POST['nom_usuario']);
            $clave=$_POST['contrasenia'];
            $tipo= mainModel::limpiar_cadena($_POST['tipo']);
            
            $cdcuenta=$_GET['cdcuenta'];
             
            if($nombre === "" || $paterno === "" || $materno === "" || $area === "" || $nomusuario === "" || $clave==="")
            {
                $alerta = [
                   "Alerta"=>"simple2",
                   "Titulo"=>"Oh, no!",
                   "Texto"=>"Los campos no deben de ir vacíos",
                   "Tipo"=>"info"
                ];
            }else
            {
                
//                $consulta1= mainModel::ejecutar_consulta_simple("SELECT nombre,apellido_paterno,apellido_materno FROM usuarios WHERE "
//                . "nombre='$nombre' or apellido_paterno='$paterno' or apellido_materno='$materno'");
//                if($consulta1->rowCount()>=1)
//                {
//                    $alerta = [
//                       "Alerta"=>"simple",
//                       "Titulo"=>"Ocurrio un error inisperado",
//                       "Texto"=>"El NOMBRE DE USUARIO que acabas de ingresar ya se encuentra registrado en el sistema",
//                       "Tipo"=>"error"
//                    ]; 
//                }else
//                {

//                    $consulta2= mainModel::ejecutar_consulta_simple("SELECT usuario FROM cuentas WHERE "
//                    . "usuario='$nomusuario'");
//                    if($consulta2->rowCount()>=1)
//                    {
//                        $alerta = [
//                           "Alerta"=>"simple",
//                           "Titulo"=>"Ocurrio un error inisperado",
//                           "Texto"=>"La CUENTA DE USUARIO que acabas de ingresar ya se encuentra registrado en el sistema",
//                           "Tipo"=>"error"
//                        ]; 
//                    }else
//                    {
//                        $consulta3= mainModel::ejecutar_consulta_simple("SELECT idcuentas FROM cuentas");
////                                                        $consulta4= mainModel::ejecutar_consulta_simple("SELECT * FROM cuentas");
//                        $numero=($consulta3->rowCount())+1;
//                                                        $row=$consulta4->fetchAll();

//                        $codigo= mainModel::generar_codigo_aleatorio("DO",8,$numero);
//                        $clave= mainModel::encryption($password);
                        $clave= mainModel::encryption($_POST['contrasenia']);
                        $datacuenta=[
                            "codigo"=>$cdcuenta,
                            "nom_usuario"=> utf8_decode($nomusuario),
                            "contrasenia"=>$clave,
                            "radio"=>$tipo,
                            "nombre"=> utf8_decode($nombre),
                            "ap_paterno"=>utf8_decode($paterno),
                            "ap_materno"=>utf8_decode($materno),
                            "area"=> utf8_decode($area)
                        ];

                        $guardarcuenta=mainModel::actualizar_cuenta($datacuenta);

                        if($guardarcuenta->rowCount()>=1)
                        {
//                            $datausuario=[
//
//                                "nombre"=> utf8_decode($nombre),
//                                "ap_paterno"=>utf8_decode($paterno),
//                                "ap_materno"=>utf8_decode($materno),
//                                "area"=> utf8_decode($area),
//                                "codigo"=>$cdcuenta
//                            ];
//
//                            $guardarusuario= actualizarlistadoModelo::actualizar_usuario_modelo($datausuario);
//
//                            if($guardarusuario->rowCount()>=0)
//                            {
                               $alerta = [
                                   "Alerta"=>"adminlist",
                                   "Titulo"=>"Registrado",
                                   "Texto"=>"Registro exitoso en el sistema",
                                   "Tipo"=>"success"
                                ];
//                            }else
//                            {
////                                mainModel::eliminar_cuenta($cdcuenta);
//                                $alerta = [
//                                   "Alerta"=>"simple2",
////                                   "Titulo"=>"Ocurrio un error inisperado",
//                                   "Texto"=>"No se actualizo la información",
//                                   "Tipo"=>"error"
//                                ];
//
//                            }

                        }else
                        {
//                            mainModel::eliminar_cuenta($cdcuenta);
                           $alerta = [
                               "Alerta"=>"simple2",
                               "Titulo"=>"Ocurrio algo inesperado",
                               "Texto"=>"No se actualizo la información",
                               "Tipo"=>"warning"
                            ]; 

                        }
//                    }/**/      
//                }/**/
            }
             return mainModel::sweet_alert($alerta);
    }
  }