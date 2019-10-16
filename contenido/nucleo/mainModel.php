<?php
     if($peticionAjax){
         require_once "../nucleo/configApp.php";
     }else {
         require_once "./nucleo/configApp.php";
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
        
        protected function ejecutar_consulta_simple($consulta){
             $respuesta=self::conectar()->prepare($consulta);
             $respuesta->execute();
             return $respuesta;
        }

        public function ejecutar_consulta_simple2($consulta){
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
            $sql=self::conectar()->prepare("INSERT INTO cuentas(cdcuenta,usuario,clave,privilegio,nombre,apellido_paterno,apellido_materno,puesto,estatus) "
            . "VALUES(:codigo,:nom_usuario,:contrasenia,:radio,:nombre,:appaterno,:apmaterno,:area,:estatus)");
             
            $sql->bindParam(":codigo",$datos['codigo']);
            $sql->bindParam(":nom_usuario",$datos['nom_usuario']);
            $sql->bindParam(":contrasenia",$datos['contrasenia']);
            $sql->bindParam(":radio",$datos['radio']);
            $sql->bindParam(":nombre",$datos['nombre']);
            $sql->bindParam(":appaterno",$datos['ap_paterno']);
            $sql->bindParam(":apmaterno",$datos['ap_materno']);
            $sql->bindParam(":area",$datos['area']);
            $sql->bindParam(":estatus",$datos['estatus']);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
        
        protected function actualizar_cuenta($datos){
            $sql=self::conectar()->prepare("UPDATE cuentas SET usuario=:nom_usuario,clave=:contrasenia,privilegio=:radio,nombre=:nombre,apellido_paterno=:appaterno,apellido_materno=:apmaterno,puesto=:area WHERE cdcuenta=:codigo");
             
            $sql->bindParam(":codigo",$datos['codigo']);
            $sql->bindParam(":nom_usuario",$datos['nom_usuario']);
            $sql->bindParam(":contrasenia",$datos['contrasenia']);
            $sql->bindParam(":radio",$datos['radio']);
            $sql->bindParam(":nombre",$datos['nombre']);
            $sql->bindParam(":appaterno",$datos['ap_paterno']);
            $sql->bindParam(":apmaterno",$datos['ap_materno']);
            $sql->bindParam(":area",$datos['area']);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
        
        protected function agregar_secciones($datos){
            $sql=self::conectar()->prepare("INSERT INTO secciones(nombre,orden,idtiposecciones,cdcuenta,fecha,hora,estatus) "
            . "VALUES(:seccion,:prioridad,:tipo,:cdcuenta,:fecha,:hora,:estatus)");
             
            $sql->bindParam(":seccion",$datos['seccion']);
            $sql->bindParam(":tipo",$datos['tipo']);
            $sql->bindParam(":prioridad",$datos['prioridad']);
            $sql->bindParam(":cdcuenta",$datos['cdcuenta']);
            $sql->bindParam(":fecha",$datos['fecha']);
            $sql->bindParam(":hora",$datos['hora']);
            $sql->bindParam(":estatus",$datos['estatus']);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
        
        protected function agregar_tiposecciones($datos){
            $sql=self::conectar()->prepare("INSERT INTO tiposecciones(tiposeccion,estatus) "
            . "VALUES(:tipo,:estatus)");
             
//            $sql->bindParam(":seccion",$datos['seccion']);
            $sql->bindParam(":tipo",$datos['seccion']);
            $sql->bindParam(":estatus",$datos['estatus']);
//            $sql->bindParam(":cdcuenta",$datos['cdcuenta']);
//            $sql->bindParam(":fecha",$datos['fecha']);
//            $sql->bindParam(":hora",$datos['hora']);
//            $sql->bindParam(":cdsecciones",$datos['cdsecciones']);
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
        
        protected function eliminar_cuenta_usuario($datos){
             $sql=self::conectar()->prepare("UPDATE cuentas SET estatus=2 WHERE cdcuenta=:codigo");
             $sql->bindParam(":codigo", $datos['cuenta']);
             $sql->execute();
//             print_r($sql->errorInfo());
             return $sql;
        }
        
        protected function eliminar_bitacora_cuenta($datos){
             $sql=self::conectar()->prepare("DELETE FROM bitacora WHERE cdcuenta=:codigo");
             $sql->bindParam(":codigo", $datos['cuenta']);
             $sql->execute();
//             print_r($sql->errorInfo());
             return $sql;
        }
        
//        protected function eliminar_usuario($datos){
//             $sql=self::conectar()->prepare("DELETE FROM usuarios WHERE cdcuenta=:codigo");
//             $sql->bindParam(":codigo", $datos['cuenta']);
//             $sql->execute();
////             print_r($sql->errorInfo());
//             return $sql;
//        }
         
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
//             print_r($sql->errorInfo());
             return $sql;
        }
        
        protected function desactivar_estatus($datos){
            $sql=self::conectar()->prepare("UPDATE secciones SET estatus=2 WHERE nombre=:nombretitulo AND idtiposecciones=:idtiposecc");
            $sql->bindParam(":nombretitulo",$datos['titulo']);
            $sql->bindParam(":idtiposecc",$datos['idtiposeccion']);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
        
        protected function activar_estatus($datos){
            $sql=self::conectar()->prepare("UPDATE secciones SET estatus=1 WHERE nombre=:nombretitulo AND idtiposecciones=:idtiposecc");
            $sql->bindParam(":nombretitulo",$datos['titulo']);
            $sql->bindParam(":idtiposecc",$datos['idtiposeccion']);
            $sql->execute();
//            print_r($sql->errorInfo());
            return $sql;
        }
        
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
        
        protected function actualizar_contenido($datoscontenido){
             $sql= self::conectar()->prepare("UPDATE contenidos SET text=:texto,link=:link,fecha_inicio=:finicio,fecha_fin=:ffinal"
                     . "WHERE idsecciones=:id");
             $sql->bindParam(":texto",$datoscontenido['texto']);
             $sql->bindParam(":link",$datoscontenido['link']);
//             $sql->bindParam(":archivo",$datoscontenido['archivo']);
//             $sql->bindParam(":pdfimg",$datoscontenido['pdfimg']);
//             $sql->bindParam(":tipo",$datoscontenido['tipo']);
             $sql->bindParam(":finicio",$datoscontenido['finicio']);
             $sql->bindParam(":ffinal",$datoscontenido['ffinal']);
             $sql->bindParam(":id",$datoscontenido['idsecciones']);
             $sql->execute();
//             print_r($sql->errorInfo());
             return $sql;
        }
        
    protected function actualizar_contenido2($datoscontenido2){
         $sql= self::conectar()->prepare("UPDATE contenidos SET text=:texto,link=:link,archivo=:archivo,pdf_imagen=:pdfimg,tipo=:tipo,fecha_inicio=:finicio,fecha_fin=:ffinal WHERE idsecciones=:id");
         $sql->bindParam(":texto",$datoscontenido2['texto']);
         $sql->bindParam(":link",$datoscontenido2['link']);
         $sql->bindParam(":archivo",$datoscontenido2['archivo']);
         $sql->bindParam(":pdfimg",$datoscontenido2['pdfimg']);
         $sql->bindParam(":tipo",$datoscontenido2['tipo']);
         $sql->bindParam(":finicio",$datoscontenido2['finicio']);
         $sql->bindParam(":ffinal",$datoscontenido2['ffinal']);
         $sql->bindParam(":id",$datoscontenido2['idsecciones']);
         $sql->execute();
//         print_r($sql->errorInfo());
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
             }elseif ($datos['Alerta']=='simple2'){
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
            }elseif ($datos['Alerta']=="inicio"){
                 $alerta="
                        <script>
                         swal({
                                  title: '".$datos['Titulo']."',
                                  text: '".$datos['Texto']."',
                                  type: '".$datos['Tipo']."',
                                  confirmButtonText: 'Aceptar'
                                }).then(function(){
                                    location.replace('http://10.11.24.69/contenido/edicionsecciones/');
                                    });
                        </script>";
             }elseif ($datos['Alerta']=="adminlist"){
                 $alerta="
                        <script>
                         swal({
                                  title: '".$datos['Titulo']."',
                                  text: '".$datos['Texto']."',
                                  type: '".$datos['Tipo']."',
                                  confirmButtonText: 'Aceptar'
                                }).then(function(){
                                    location.replace('http://10.11.24.69/contenido/adminlist/');
                                    });
                        </script>";
             }elseif ($datos['Alerta']=="edicion"){
                 $alerta="
                        <script>
                         swal({
                                  title: '".$datos['Titulo']."',
                                  text: '".$datos['Texto']."',
                                  type: '".$datos['Tipo']."',
                                  confirmButtonText: 'Aceptar'
                                }).then(function(){
                                    location.replace('http://10.11.24.69/contenido/edicionsecciones/');
                                    });
                        </script>";
             }
             return $alerta;
        }
    }
    //location.replace('http://10.11.24.69/contenido/edicionsecciones/');