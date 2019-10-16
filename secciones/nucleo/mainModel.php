<?php
     if($peticionAjax){
         require_once "./nucleo/configApp.php";
     }else {
         require_once "../nucleo/configApp.php";
     }
     class mainModel{
        protected function conectar(){
             $enlace = new PDO(SGBD,USER,PASS);
             return $enlace;
        }
        
        public function conectar2(){
             $enlace = new PDO(SGBD,USER,PASS);
             return $enlace;
        }
        
        public function conectar_listado(){
             $enlace = new PDO(SGBD,USER,PASS);
//             print_r($enlace->errorInfo());
             return $enlace;
        }
        
        public function ejecutar_consulta_simple($consulta){
             $respuesta=self::conectar()->prepare($consulta);
             $respuesta->execute();
             return $respuesta;
        }

        protected function ejecutar_consulta_simple2($consulta){
             $respuesta=self::conectar()->prepare($consulta);
             $respuesta->execute();
             return $respuesta;
        }
        
        protected function obtener_datos($datos)
        {        
            $conexion= mainModel::conectar();
             
            $datos= $conexion->query("SELECT
                                                estatuscorres.codigocorres
                                                FROM
                                                correspondencia
                                                INNER JOIN recepciones ON correspondencia.volante = recepciones.volante
                                                INNER JOIN estatuscorres ON estatuscorres.codigocorres = correspondencia.codigocorres
                                                WHERE
                                                correspondencia.volante = '$datos' AND
                                                estatuscorres.estatuscorres = 'recibido'");
            $datos->execute();
            foreach ($datos as $row) {
                $nada=$row['codigocorres'];
            }      
            return $nada;
        }
        
//        protected function obtener_estatus($datos)
//        {        
//            $conexion= mainModel::conectar();
//             
//            $datos= $conexion->query("SELECT
//                                                estatuscorres.codigocorres
//                                                FROM
//                                                correspondencia
//                                                INNER JOIN recepciones ON correspondencia.volante = recepciones.volante
//                                                INNER JOIN estatuscorres ON estatuscorres.codigocorres = correspondencia.codigocorres
//                                                WHERE
//                                                correspondencia.volante = '$datos' AND
//                                                estatuscorres.estatus = 'recibido'");
//            foreach ($datos as $row) {
//                $nada=$row['codigocorres'];
//            }      
//            return $nada;
//        }
        
        protected function agregar_cuenta($datos){
            $sql=self::conectar()->prepare("INSERT INTO cuentas(cdcuenta,usuario,clave,privilegio) "
            . "VALUES(:codigo,:nom_usuario,:contrasenia,:radio)");
             
            $sql->bindParam(":codigo",$datos['codigo']);
            $sql->bindParam(":nom_usuario",$datos['nom_usuario']);
            $sql->bindParam(":contrasenia",$datos['contrasenia']);
            $sql->bindParam(":radio",$datos['radio']);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
        
        protected function agregar_secciones($datos){
            $sql=self::conectar()->prepare("INSERT INTO secciones(nombre,tipo_seccion,orden,cdcuenta,fecha,hora,cdsecciones) "
            . "VALUES(:seccion,:tipo,:prioridad,:cdcuenta,:fecha,:hora,:cdsecciones)");
             
            $sql->bindParam(":seccion",$datos['seccion']);
            $sql->bindParam(":tipo",$datos['tipo']);
            $sql->bindParam(":prioridad",$datos['prioridad']);
            $sql->bindParam(":cdcuenta",$datos['cdcuenta']);
            $sql->bindParam(":fecha",$datos['fecha']);
            $sql->bindParam(":hora",$datos['hora']);
            $sql->bindParam(":cdsecciones",$datos['cdsecciones']);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
        
        protected function guardar_atender($datos){      
            $sql= self::conectar()->prepare("INSERT INTO atenderbitacora(abcodigo,fecha,hora,leido,instruccion,accionimplementar,compartir,estatus,cdcuenta,volante,idusuario) "
                     . "VALUES(:codigocorres,:fecha,:hora,:leido,:acciones,:accionesjefe,:compartir,:estatus,:cdcuenta,:volante,:idusuario)");
                          
             $sql->bindParam(":codigocorres", $datos['codigocorres']);
             $sql->bindParam(":fecha", $datos['fecha']);
             $sql->bindParam(":hora", $datos['hora']);
             $sql->bindParam(":leido", $datos['leido']);
             $sql->bindParam(":acciones", $datos['acciones']);
             $sql->bindParam(":accionesjefe", $datos['accionesjefe']);
             $sql->bindParam(":compartir", $datos['compartir']);
             $sql->bindParam(":estatus", $datos['estatus']);
             $sql->bindParam(":cdcuenta", $datos['cdcuenta']);
             $sql->bindParam(":volante", $datos['volante']);
             $sql->bindParam(":idusuario", $datos['idusuario']);
             $sql->execute();
             //print_r($sql->errorInfo());
             return $sql;
        }
        
        protected function guardar_estatus($datos){
            $sql= self::conectar()->prepare("INSERT INTO estatus(estatus,abcodigo) "
                     . "VALUES(:estatus,:codigocorres)");
             $sql->bindParam(":estatus", $datos['estatus']);
             $sql->bindParam(":codigocorres", $datos['codigocorres']);
             $sql->execute();
             //print_r($sql->errorInfo());
            return $sql;
        }
        
        protected function eliminar_seccion($cdsecciones){
             $sql=self::conectar()->prepare("DELETE FROM secciones WHERE cdsecciones=:cdsecciones");
             $sql->bindParam(":cdsecciones", $cdsecciones);
             $sql->execute();
    //             print_r($sql->errorInfo());
             return $sql;
        }
        
        protected function eliminar_contenido($volante){
             $sql=self::conectar()->prepare("DELETE FROM contenidos WHERE cdsecciones=:cdsecciones");
             $sql->bindParam(":cdsecciones", $cdsecciones);
             $sql->execute();
    //             print_r($sql->errorInfo());
             return $sql;
        }
        
        protected function eliminar_cuenta($codigo){
             $sql=self::conectar()->prepare("DELETE FROM cuentas WHERE cdcuenta=:codigo");
             $sql->bindParam(":codigo", $codigo);
             $sql->execute();
    //             print_r($sql->errorInfo());
             return $sql;
        }
         
        protected function guardar_bitacora($datos){
            $sql=self::conectar()->prepare("INSERT INTO bitacora(bcodigo,bfecha,bhorainicio,bhfinal,btipo,banio,cdcuenta) "
            . "VALUES(:bcodigo,:bfecha,:bhorainicio,:bhorafinal,:btipo,:banio,:cuenta)");
            $sql->bindParam(":bcodigo",$datos['bcodigo']);
            $sql->bindParam(":bfecha",$datos['bfecha']);
            $sql->bindParam(":bhorainicio",$datos['bhorainicio']);
            $sql->bindParam(":bhorafinal",$datos['bhorafinal']);
            $sql->bindParam(":btipo",$datos['btipo']);
            $sql->bindParam(":banio",$datos['banio']);
            $sql->bindParam(":cuenta",$datos['cuenta']);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
        
        protected function guardar_respuesta($sigob,$pdfrespuesta,$volante2){
            $sql=self::conectar()->prepare("INSERT INTO respuestas(sigob,archivorespuesta,volante) "
            . "VALUES(:sigob,:respuesta,:volante)");
            $sql->bindParam(":sigob",$sigob);
            $sql->bindParam(":respuesta",$pdfrespuesta);
            $sql->bindParam(":volante",$volante2);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
         
        protected function actualizar_bitacora($codigo,$hora){
             $sql= self::conectar()->prepare("UPDATE bitacora SET bhfinal=:hora WHERE bcodigo=:codigo");
             $sql->bindParam(":hora",$hora);
             $sql->bindParam(":codigo",$codigo);
             $sql->execute();
             return $sql;
        }
        
        /*protected function actualizar_estatus($datos){
             $sql= self::conectar()->prepare("UPDATE estatus SET estatus=:tramite WHERE abcodigo=:abcodigo");
             $sql->bindParam(":tramite",$datos['tramite']);
             $sql->bindParam(":abcodigo",$datos['abcodigo']);
             $sql->execute();
             return $sql;
        }*/
        
        /*protected function actualizar_atenderbitacora($datos){
             $sql= mainModel::conectar()->prepare("UPDATE estatus SET accion=:accion WHERE abcodigo=:abcodigo");
                          ;
             $sql->bindParam(":accion", $datos['accion']);
             $sql->bindParam(":abcodigo", $datos['abcodigo']);
             $sql->execute();
             //print_r($sql->errorInfo());
             return $sql;
        }*/
        
        protected function actualizar_estatuscorres($codigocorres,$tramite){
             $sql= self::conectar()->prepare("UPDATE estatuscorres SET estatuscorres=:concluido WHERE codigocorres=:codigocorres");
             $sql->bindParam(":concluido",$tramite);
             $sql->bindParam(":codigocorres",$codigocorres);
             $sql->execute();
             //print_r($sql->errorInfo());
             return $sql;
        }
         
        protected function actualizar_estatus_comentario($datos){
             $sql= self::conectar()->prepare("UPDATE estatus SET estatus=:concluido WHERE abcodigo=:abcodigo");
             $sql->bindParam(":concluido",$datos['estatus']);
             $sql->bindParam(":abcodigo",$datos['abcodigo']);
             $sql->execute();
             //print_r($sql->errorInfo());
             return $sql;
        }

        protected function eliminar_bitacora($codigo){
             $sql=self::conectar()->preare("DELETE FROM bitacora WHERE cdcuenta=:codigo");
             $sql->bindParam(":codigo",$codigo);
             $sql->execute();
             return $sql;
        }
         
        public function encryption($string){
             $output=FALSE;
             $key=hash('sha256', SECRET_KEY);
             $iv= substr(hash('sha256', SECRET_IV), 0, 16);
             $output= openssl_encrypt($string, METHOD, $key, 0, $iv);
             $output= base64_encode($output);
             return $output;
        }
        
        public function decryption($string){
             $key=hash('sha256', SECRET_KEY);
             $iv= substr(hash('sha256', SECRET_IV), 0, 16);
             $output= openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
//             $output= base64_decode($output);
             return $output;
        }
        
        protected function generar_codigo_aleatorio($letra,$longitud,$num){
             for($i=1;$i<=$longitud;$i++){
                 $numero = rand(0,9);
                 $letra.= $numero; 
             }
             return $letra.$num; //o return $letra."-".$num;
        }
        
        protected function limpiar_cadena($cadena){
            $cadena=trim($cadena);//elimina los espacios en blanco de los textos
            $cadena=stripslashes($cadena);//elimina las barras invertidas
            $cadena= str_ireplace("<script>","",$cadena);//elimina el valos script
            $cadena= str_ireplace("</script>","",$cadena);
            $cadena= str_ireplace("<script src>","",$cadena);
            $cadena= str_ireplace("<script type=>","",$cadena);
            $cadena= str_ireplace("SELECT FROM *","",$cadena);
            $cadena= str_ireplace("DELETE FROM","",$cadena);
            $cadena= str_ireplace("INSERT INTO","",$cadena);
            $cadena= str_ireplace("--","",$cadena);
            $cadena= str_ireplace("^","",$cadena);
            $cadena= str_ireplace("[","",$cadena);
            $cadena= str_ireplace("]","",$cadena);
            $cadena= str_ireplace("==","",$cadena);
            $cadena= str_ireplace(";","",$cadena);
            return $cadena;
        }
        
        protected function sweet_alert($datos){
             if($datos['Alerta']=='simple'){
                 $alerta="<script>
                         swal(
                                 '".$datos['Titulo']."', 
                                 '".$datos['Texto']."', 
                                 '".$datos['Tipo']."'
                             );
                         </script>";
             }elseif ($datos['Alerta']=="recargar"){
                 $alerta="
                        <script>
                         swal({
                                  title: '".$datos['Titulo']."',
                                  text: '".$datos['Texto']."',
                                  type: '".$datos['Tipo']."',
                                  confirmButtonText: 'Aceptar'
                                }).then(function(){
                                     location.reload();
                                    });
                        </script>";
             }elseif($datos['Alerta']=='limpiar'){
                   $alerta="<script>                                
                                swal({
                                      title: '".$datos['Titulo']."',
                                      text: '".$datos['Texto']."',
                                      type: '".$datos['Tipo']."',
                                      confirmButtonText: 'Aceptar'
                                    }).then((result) => {
                                        $('.formularioajax')[0].reset();
                                      });
                            </script>";
            }
             return $alerta;
        }
    }