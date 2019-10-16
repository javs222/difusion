<?php
    if($peticionAjax){
         require_once "../modelos/administradorModelo.php";
     }else {
         require_once "./modelos/administradorModelo.php";
     }
     //contralador para agregar administrador
     class adminstradorControlador extends administradorModelo
     {
         public function agregar_administrador_controlador(){
             $nombre= mainModel::limpiar_cadena($_POST['nombre']);
             $paterno= mainModel::limpiar_cadena($_POST['ap_paterno']);
             $materno= mainModel::limpiar_cadena($_POST['ap_materno']);
             $area= mainModel::limpiar_cadena($_POST['area']);
             
             $nomusuario= mainModel::limpiar_cadena($_POST['nom_usuario']);
             $password= mainModel::limpiar_cadena($_POST['contrasenia']);
             $password2= mainModel::limpiar_cadena($_POST['contrasenia2']);
             $tipo=$_POST['radio'];
             
             
             
            if($nombre === "")
            {
                $alerta = [
                   "Alerta"=>"simple2",
                   "Titulo"=>"Oh, no!",
                   "Texto"=>"Debes de ingresar un nombre",
                   "Tipo"=>"info"
                ];
            }else
            {
                if($paterno === "")
                {
                    $alerta = [
                       "Alerta"=>"simple2",
                       "Titulo"=>"Oh, no!",
                       "Texto"=>"Debes de ingresar un apellido paterno",
                       "Tipo"=>"info"
                    ];
                }else
                {
                    if($materno === "")
                    {
                        $alerta = [
                           "Alerta"=>"simple2",
                           "Titulo"=>"Oh, no!",
                           "Texto"=>"Debes de ingresar un apellido maerno",
                           "Tipo"=>"info"
                        ];
                    }else
                    {
                        if($area === "")
                        {
                            $alerta = [
                               "Alerta"=>"simple2",
                               "Titulo"=>"Oh, no!",
                               "Texto"=>"Debes de ingresar un puesto",
                               "Tipo"=>"info"
                            ];
                        }else
                        {
                            if($nomusuario === "")
                            {
                                $alerta = [
                                   "Alerta"=>"simple2",
                                   "Titulo"=>"Oh, no!",
                                   "Texto"=>"Debes de ingresar un nombre de usuario",
                                   "Tipo"=>"info"
                                ];
                            }else
                            {
                                if($password === "")
                                {
                                    $alerta = [
                                       "Alerta"=>"simple2",
                                       "Titulo"=>"Oh, no!",
                                       "Texto"=>"Debes de ingresar una contraseña",
                                       "Tipo"=>"info"
                                    ];
                                }else
                                {
                                    if($password2 === "")
                                    {
                                        $alerta = [
                                           "Alerta"=>"simple2",
                                           "Titulo"=>"Oh, no!",
                                           "Texto"=>"Debes de repetir la contraseña",
                                           "Tipo"=>"info"
                                        ];
                                    }else
                                    {
                                        if($tipo==="")
                                        {
                                            $alerta = [
                                               "Alerta"=>"simple2",
                                               "Titulo"=>"Oh, no!",
                                               "Texto"=>"Debes de ingrear tl tipo de usuario",
                                               "Tipo"=>"info"
                                            ];
                                        }else
                                        {
                                            if($password!= $password2)
                                            {
                                                $alerta = [
                                                  "Alerta"=>"simple2",
                                                  "Titulo"=>"Oh, no!",
                                                  "Texto"=>"Las contraseñas que acabas de ingresar no coinciden, porfavor intenta nuevamente",
                                                  "Tipo"=>"info"
                                                ];
                                            }else
                                            {
                                                $consulta1= mainModel::ejecutar_consulta_simple("SELECT
                                                                                                        cuentas.nombre,
                                                                                                        cuentas.apellido_paterno,
                                                                                                        cuentas.apellido_materno,
                                                                                                        cuentas.estatus
                                                                                                        FROM cuentas
                                                                                                        WHERE
                                                                                                        cuentas.nombre = '$nombre' AND
                                                                                                        cuentas.apellido_paterno = '$paterno' AND
                                                                                                        cuentas.apellido_materno = '$materno' AND
                                                                                                        cuentas.estatus = '1'");
                                                if($consulta1->rowCount()>=1)
                                                {
                                                    $alerta = [
                                                       "Alerta"=>"simple2",
                                                       "Titulo"=>"Oh, no!",
                                                       "Texto"=>"El NOMBRE DE USUARIO que acabas de ingresar ya se encuentra registrado en el sistema",
                                                       "Tipo"=>"info"
                                                    ]; 
                                                }else
                                                {

                                                    $consulta2= mainModel::ejecutar_consulta_simple("SELECT usuario
                                                                                                                    FROM cuentas
                                                                                                                    WHERE
                                                                                                                    cuentas.usuario = '$nomusuario' AND
                                                                                                                    cuentas.estatus = '1'");
                                                    if($consulta2->rowCount()>=1)
                                                    {
                                                        $alerta = [
                                                           "Alerta"=>"simple2",
                                                           "Titulo"=>"Oh, no!",
                                                           "Texto"=>"La CUENTA DE USUARIO que acabas de ingresar ya se encuentra registrado en el sistema",
                                                           "Tipo"=>"info"
                                                        ]; 
                                                    }else
                                                    {
                                                        $consulta3= mainModel::ejecutar_consulta_simple("SELECT idcuentas FROM cuentas");
//                                                        $consulta4= mainModel::ejecutar_consulta_simple("SELECT * FROM cuentas");
                                                        $numero=($consulta3->rowCount())+1;
//                                                        $row=$consulta4->fetchAll();
                                                        
                                                        $codigo= mainModel::generar_codigo_aleatorio("DO",8,$numero);
                                                        $clave= mainModel::encryption($password);
                                                        
                                                        $datacuenta=[
                                                            "codigo"=>$codigo,
                                                            "nom_usuario"=> utf8_encode($nomusuario),
                                                            "contrasenia"=>$clave,
                                                            "radio"=>$tipo,
                                                            "nombre"=> utf8_encode($nombre),
                                                            "ap_paterno"=>  utf8_encode($paterno),
                                                            "ap_materno"=>  utf8_encode($materno),
                                                            "area"=> utf8_encode($area),
                                                            "estatus"=>1
                                                        ];

                                                        $guardarcuenta=mainModel::agregar_cuenta($datacuenta);

                                                        if($guardarcuenta->rowCount()>=1)
                                                        {
//                                                            $datausuario=[
//                                                                
//                                                                "nombre"=> utf8_decode($nombre),
//                                                                "ap_paterno"=>utf8_decode($paterno),
//                                                                "ap_materno"=>utf8_decode($materno),
//                                                                "area"=> utf8_decode($area),
//                                                                "codigo"=>$codigo
//                                                            ];
//
//                                                            $guardarusuario= administradorModelo::agregar_administrador_modelo($datausuario);
//
//                                                            if($guardarusuario->rowCount()>=1)
//                                                            {
                                                               $alerta = [
                                                                   "Alerta"=>"limpiar",
                                                                   "Titulo"=>"Registrado",
                                                                   "Texto"=>"Registro exitoso en el sistema",
                                                                   "Tipo"=>"success"
                                                                ];
//                                                            }else
//                                                            {
//                                                                mainModel::eliminar_cuenta($codigo);
//                                                                $alerta = [
//                                                                   "Alerta"=>"simple2",
////                                                                   "Titulo"=>"Ocurrio un error inisperado",
//                                                                   "Texto"=>"No hemos podido registrar la cuenta de usuario",
//                                                                   "Tipo"=>"warning"
//                                                                ];
//
//                                                            }

                                                        }else
                                                        {
                                                            mainModel::eliminar_cuenta($codigo);
                                                           $alerta = [
                                                               "Alerta"=>"simple2",
                                                               "Titulo"=>"Ocurrio algo inisperado",
                                                               "Texto"=>"No hemos podido registrar la cuenta de usuario",
                                                               "Tipo"=>"warning"
                                                            ]; 
                                                        }
                                                    }      
                                                }/**/
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
             return mainModel::sweet_alert($alerta);
         }       
         //controlador para paginar
         public function paginador_administrador_controlador($pagina,$registros){
             //,$codigo
             $pagina= mainModel::limpiar_cadena($pagina);
             $registros= mainModel::limpiar_cadena($registros);
//             $codigo= mainModel::limpiar_cadena($codigo);
//             $busqueda= mainModel::limpiar_cadena($busqueda);
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
            
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                                        secciones.idsecciones,
                                                        secciones.nombre,
                                                        secciones.orden,
                                                        secciones.cdcuenta,
                                                        secciones.fecha,
                                                        secciones.hora,
                                                        tiposecciones.tiposeccion,
                                                        tiposecciones.idtiposecciones,
                                                        contenidos.idcontenidos,
                                                        contenidos.text,
                                                        contenidos.link,
                                                        contenidos.archivo,
                                                        contenidos.pdf_imagen,
                                                        contenidos.tipo,
                                                        contenidos.fecha_inicio,
                                                        contenidos.fecha_fin,
                                                        secciones.estatus
                                                        FROM
                                                        secciones
                                                        INNER JOIN tiposecciones ON tiposecciones.idtiposecciones = secciones.idtiposecciones
                                                        INNER JOIN contenidos ON contenidos.idsecciones = secciones.idsecciones
                                                        ORDER BY
                                                        tiposecciones.idtiposecciones ASC
                                                        LIMIT $inicio,$registros";
                 
                                                $paginaurl="edicionsecciones";
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query($consulta);
             
             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Título de la Sección</th>
                                        <th class="text-center">Sección</th>
                                        <th class="text-center">Fecha de Visualización</th>
                                        <th class="text-center">Fecha de Vencimiento</th>
                                        <th class="text-center">Editar contenido del título</th>
                                        <th class="text-center">Activar/Desactivar</th>
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
//                 $i=1;
                 foreach ($datos as $rows){
                     $nombre= utf8_decode($rows['nombre']);
                     $estatus=$rows['estatus'];
                     $tabla.='<tr>
                                <td>'.$contador.'</td>
                                <td>'. utf8_decode($rows['nombre']).'</td>
                                <td>'. utf8_decode($rows['tiposeccion']).'</td>
                                <td>'.$rows['fecha_inicio'].'</td>
                                <td>'.$rows['fecha_fin'].'</td>';
                     $tabla.='  <td><a href="'.SERVERURL.'edicion/'.mainModel::encryption($rows['idsecciones']).'/'.mainModel::encryption($rows['idcontenidos']).'" class="btn btn-success btn-raised btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>';
                    if($estatus==1){
                        $tabla.='<td><a href="'.mainModel::encryption($nombre).' '.mainModel::encryption($rows['idtiposecciones']).'" class="desactivar btn btn-danger btn-raised btn-sm"> Desactivar título con su contenido <span class="glyphicon glyphicon-remove-sign"></span></a></td>';
                    }elseif($estatus==2){
                        $tabla.='<td><a href="'.mainModel::encryption($nombre).' '.mainModel::encryption($rows['idtiposecciones']).'" class="activar btn btn-success btn-raised btn-sm"> Activar título con su contenido <span class="glyphicon glyphicon-check"></span></a></td>';
                    }
                     $tabla.='  </tr>';
                     $contador++;
//                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
             }
             
             $tabla.='</tbody></table></div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             return $tabla;
         }
         
         public function paginador_adminlist_controlador($pagina,$registros){
             //,$codigo
             $pagina= mainModel::limpiar_cadena($pagina);
             $registros= mainModel::limpiar_cadena($registros);
//             $codigo= mainModel::limpiar_cadena($codigo);
//             $busqueda= mainModel::limpiar_cadena($busqueda);
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
            
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
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
                                                        cuentas.estatus = '1'
                                                        LIMIT $inicio,$registros";
                 
                                                $paginaurl="adminlist";
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query($consulta);
             
             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido Paterno</th>
                                        <th class="text-center">Apellido Materno</th>
                                        <th class="text-center">Puesto</th>
                                        <th class="text-center">Nombre de Usuario</th>
                                        <th class="text-center">Privilegio</th>
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
//                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                <td>'.$contador.'</td>
                                <td>'.utf8_decode($rows['nombre']).'</td>
                                <td>'.utf8_decode($rows['apellido_paterno']).'</td>
                                <td>'.utf8_decode($rows['apellido_materno']).'</td>
                                <td>'.utf8_decode($rows['puesto']).'</td>
                                <td>'.utf8_decode($rows['usuario']).'</td>
                                <td>'.utf8_decode($rows['privilegio']).'</td>
                                <td><a href="'.SERVERURL.'actualizaradminlist/'.  mainModel::encryption($rows['cdcuenta']).'" class="btn btn-success btn-raised btn-xs"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a href="'.mainModel::encryption($rows['cdcuenta']).'" class="eliminarcuenta btn btn-danger btn-raised btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
                              </tr>';
                     $contador++;
//                     $i++;<td><a href="'.SERVERURL.'edicion/'.mainModel::encryption($rows['idsecciones']).'/'.mainModel::encryption($rows['idcontenidos']).'" class="btn btn-success btn-raised btn-xs"><span class="glyphicon glyphicon-pencil"></span></a></td>
                     //'.SERVERURL.'actualizaradminlist/'.mainModel::encryption($rows['idsecciones']).'/'.mainModel::encryption($rows['idcontenidos']).'
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
             }
             
             $tabla.='</tbody></table></div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             return $tabla;
         }
         
            public function paginador_accion_controlador($pagina,$registros,$codigo,$busqueda){
             $pagina= mainModel::limpiar_cadena($pagina);
             $registros= mainModel::limpiar_cadena($registros);
             $codigo= mainModel::limpiar_cadena($codigo);
             $busqueda= mainModel::limpiar_cadena($busqueda);
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
            
             if(isset($busqueda) && $busqueda!=""){
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                            CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                recepciones.id,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                atenderbitacora.abcodigo,
                                                atenderbitacora.compartir,
                                                estatus.estatus,
                                                estatus.accion,
                                                estatus.archivorespuesta,
                                                estatus.sigob
                                                FROM
                                                recepciones
                                                INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                WHERE
                                            ((usuarios.cdcuenta = '$codigo' AND
                                             estatus.estatus = 'accion') AND (recepciones.volante LIKE '%$busqueda%' 
                                              OR recepciones.fecha_oficio LIKE '%$busqueda%'
                                              OR recepciones.n_oficio LIKE '%$busqueda%' OR recepciones.asunto LIKE '%$busqueda%'
                                              OR recepciones.prosedencia LIKE '%$busqueda%' OR recepciones.nombre_prosedencia LIKE '%$busqueda%'
                                              OR estatus.sigob LIKE '%$busqueda%'))
                                             ORDER BY recepciones.volante ASC LIMIT $inicio,$registros";
                                                
                                                $paginaurl="pdfbusqueda";
             }else{
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                                CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                recepciones.id,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                atenderbitacora.abcodigo,
                                                atenderbitacora.compartir,
                                                estatus.estatus,
                                                estatus.accion,
                                                estatus.archivorespuesta,
                                                estatus.sigob
                                                FROM
                                                recepciones
                                                INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                WHERE
                                                estatus.estatus = 'accion' AND
                                                usuarios.cdcuenta = '$codigo'
                                                ORDER BY recepciones.volante ASC LIMIT $inicio,$registros";
                 
                                                $paginaurl="pdfaccion";

             }
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query($consulta);
             
             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Fecha del Oficio</th>
                                        <th class="text-center">Asunto</th>
                                        <th class="text-center">Área de Procedencia</th>
                                        <th class="text-center">Emisor</th>
                                        <th class="text-center">Fecha de Ingreso</th>
                                        <th class="text-center">Hora de Ingreso</th>
                                        <th class="text-center">Número del Oficio</th>
                                        <th class="text-center">Número de Volante</th>
                                        <th class="text-center">Archivo</th>
                                        <th class="text-center">Comentario</th>
                                        <th class="text-center">Archivo Respuesta</th>
                                        <th class="text-center">Concluir</th>
                                        <th class="text-center"></th>
                                        
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
//                 $i=1;
                 foreach ($datos as $rows){
//                     $fecha_oficio= strtotime($rows['fecha_oficio']);
//                     $fecha_oficio= date('d/m/Y', $fecha_oficio);
                     $tabla.='<tr>
                                    
                                    <td>'.$contador.'</td>
                                    <td>'.$rows['fecha_oficio'].'</td>
                                    <td>'.utf8_encode($rows['asunto']).'</td>
                                    <td>'.utf8_encode($rows['prosedencia']).'</td>
                                    <td>'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td>'.$rows['fecha_recibido'].'</td>
                                    <td>'.$rows['hora'].'</td>
                                    <td>'.$rows['n_oficio'].'</td>
                                    <td>'.$rows['volante'].'</td>
                                    <td><a target="_blank" href="'.SERVERURL.utf8_encode($rows['archivo']).'">Vista Previa</a></td>
                                    <td>'.utf8_encode($rows['accion']).'</td>
                                    <td><a target="_blank" href="'.SERVERURL.utf8_encode($rows['archivorespuesta']).'">Vista Previa</a></td>
                                    <td>
                                        <a href="'.mainModel::encryption($rows['abcodigo']).'" class="concluircomentario">
                                          <i class="zmdi zmdi-lock-outline zmdi-hc-lg mdc-text-red-700 animated infinite wobble"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="'.SERVERURL.'modificar/'.mainModel::encryption($codigo).'/'.mainModel::encryption($rows['volante']).'/'.mainModel::encryption($rows['abcodigo']).'">
                                          <i class="zmdi zmdi-edit zmdi-hc-lg mdc-text-green animated infinite wobble"></i>
                                        </a>
                                    </td>
                                    
                                </tr>';
                     $contador++;
//                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='</tbody></table></div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         }
         
         public function paginador_tramite_administrador_controlador($pagina,$registros,$codigo,$busqueda){
             $pagina= mainModel::limpiar_cadena($pagina);
             $registros= mainModel::limpiar_cadena($registros);
             $codigo= mainModel::limpiar_cadena($codigo);
             $busqueda= mainModel::limpiar_cadena($busqueda);
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             
//             $busqueda= mainModel::limpiar_cadena($busqueda);
             
             if(isset($busqueda) && $busqueda!=""){
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                            CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                recepciones.id,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                atenderbitacora.abcodigo,
                                                atenderbitacora.compartir,
                                                estatus.estatus,
                                                estatus.accion,
                                                estatus.archivorespuesta,
                                                estatus.sigob
                                                FROM
                                                recepciones
                                                INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                WHERE
                                            ((usuarios.cdcuenta = '$codigo' AND
                                             estatus.estatus = 'tramite') AND (recepciones.volante LIKE '%$busqueda%' 
                                              OR recepciones.fecha_oficio LIKE '%$busqueda%'
                                              OR recepciones.n_oficio LIKE '%$busqueda%' OR recepciones.asunto LIKE '%$busqueda%'
                                              OR recepciones.prosedencia LIKE '%$busqueda%' OR recepciones.nombre_prosedencia LIKE '%$busqueda%'
                                              OR estatus.sigob LIKE '%$busqueda%'))
                                             ORDER BY recepciones.volante ASC LIMIT $inicio,$registros";
                 
                                                
                                                $paginaurl="busquedatramite";
             }else{
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                                      CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                      recepciones.id,
                                                      recepciones.volante,
                                                      recepciones.fecha_oficio,
                                                      recepciones.asunto,
                                                      recepciones.prosedencia,
                                                      recepciones.nombre_prosedencia,
                                                      recepciones.fecha_recibido,
                                                      recepciones.hora,
                                                      recepciones.n_oficio,
                                                      recepciones.archivo,
                                                      atenderbitacora.instruccion,
                                                      atenderbitacora.accionimplementar,
                                                      atenderbitacora.abcodigo,
                                                      atenderbitacora.compartir AS compartir1,
                                                      atenderbitacora.estatus
                                                      FROM
                                                      recepciones
                                                      INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                      INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                      WHERE
                                                      atenderbitacora.estatus = 'tramite' AND
                                                      usuarios.cdcuenta = '$codigo'

                                                      ORDER BY recepciones.volante ASC LIMIT $inicio,$registros";
                 
                                                $paginaurl="pdftramite";

             }

             $conexion= mainModel::conectar();
             
             $datos= $conexion->query($consulta);
             
             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Fecha del Oficio</th>
                                        <th class="text-center">Asunto</th>
                                        <th class="text-center">Área de Procedencia</th>
                                        <th class="text-center">Emisor</th>
                                        <th class="text-center">Fecha de Ingreso</th>
                                        <th class="text-center">Hora de Ingreso</th>
                                        <th class="text-center">Número del Oficio</th>
                                        <th class="text-center">Número de Volante</th>
                                        <th class="text-center">Instrucción</th>
                                        <th class="text-center">Comentario</th>
                                        <th class="text-center info">Correspondencia Compartida con</th>
                                        <th class="text-center">Archivo</th>
                                        <th class="text-center">Comentario</th>
                                        <th class="text-center">Concluir</th>
                                   </tr>
                                </thead>
                                <tbody>';

             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                    
                                  <td>'.$contador.'</td>
                                  <td>'.$rows['fecha_oficio'].'</td>
                                  <td>'.utf8_encode($rows['asunto']).'</td>
                                  <td>'.utf8_encode($rows['prosedencia']).'</td>
                                  <td>'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                  <td>'.$rows['fecha_recibido'].'</td>
                                  <td>'.$rows['hora'].'</td>
                                  <td>'.$rows['n_oficio'].'</td>
                                  <td>'.$rows['volante'].'</td>
                                  <td>'.$rows['instruccion'].'</td>
                                  <td>'.utf8_encode($rows['accionimplementar']).'</td>';
                      
                      $volante=$rows['volante'];
                      $compartir1=$rows['compartir1'];
                      $consul= mainModel::ejecutar_consulta_simple("SELECT
                                                                    CONCAT_WS(' ',usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                                    atenderbitacora.compartir,
                                                                    estatus.accion
                                                                    FROM
                                                                    recepciones
                                                                    INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                                    INNER JOIN usuarios ON usuarios.idusuario = atenderbitacora.idusuario
                                                                    INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                                    WHERE
                                                                    usuarios.cdcuenta <> '$codigo' AND
                                                                    atenderbitacora.volante = '$volante'");
                      
                     
                    $tabla.='<td class="text-center">';
                        while($rs = $consul->fetch(PDO::FETCH_ASSOC))
                        { 
                            if($rs['compartir']=="Compartido")
                            {
                                $tabla.='<br>
                                        <div>'.utf8_encode($rs['persona']).'</div>';
                            }
                        }
//                    $tabla.='</td>';

                      if($compartir1=="Directa")
                      {       
                        $tabla.='<div> Directa</div>';
                      }
                    $tabla.='</td>';            
                      $tabla.='   <td><a target="_blank" href="'.SERVERURL.utf8_encode($rows['archivo']).'">Vista Previa</a></td>
                                  <td><a href="'.SERVERURL.'accion/'.mainModel::encryption($codigo).'/'.mainModel::encryption($rows['volante']).'/'.mainModel::encryption($rows['abcodigo']).'" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-save zmdi-hc-lg"></i></a></td>
                                  <td><a href="'.SERVERURL.'respuestas/'.mainModel::encryption($codigo).'/'.mainModel::encryption($rows['volante']).'/'.mainModel::encryption($rows['abcodigo']).'" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-save zmdi-hc-lg"></i></a></td>     
                                </tr>';
                     $contador++;
                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '     </form>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         }

         public function paginador_busqueda_general_administrador_controlador($pagina,$registros,$codigo,$busqueda){
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int)$pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             $busqueda= mainModel::limpiar_cadena($busqueda);
             
             if(isset($busqueda) && $busqueda!=""){
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                            CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                recepciones.id,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                atenderbitacora.abcodigo,
                                                atenderbitacora.compartir AS compartir2,
                                                estatus.estatus AS estatus1,
                                                estatus.accion,
                                                estatus.archivorespuesta,
                                                estatus.sigob
                                                FROM
                                                recepciones
                                                INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                WHERE
                                                recepciones.volante LIKE '%$busqueda%' OR recepciones.fecha_oficio LIKE '%$busqueda%'
                                                OR recepciones.n_oficio LIKE '%$busqueda%' OR recepciones.asunto LIKE '%$busqueda%'
                                                OR recepciones.prosedencia LIKE '%$busqueda%' OR recepciones.nombre_prosedencia LIKE '%$busqueda%'
                                                OR estatus.sigob LIKE '%$busqueda%'
                                                ORDER BY recepciones.id ASC LIMIT $inicio,$registros";
                                                
                                                $paginaurl="busquedageneral";
             }else{
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                                CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                recepciones.id,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                atenderbitacora.abcodigo,
                                                atenderbitacora.compartir AS compartir2,
                                                estatus.estatus AS estatus1,
                                                estatus.accion,
                                                estatus.archivorespuesta,
                                                estatus.sigob
                                                FROM
                                                recepciones
                                                INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                ORDER BY recepciones.id ASC LIMIT $inicio,$registros";
                 
                                                $paginaurl="busquedageneral";

             }


             $conexion= mainModel::conectar();
             
             $datos= $conexion->query($consulta);
             
             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();

             $npaginas= ceil($total/$registros);
//             print_r($npaginas);
             $tabla.='<div class="panel">
                        <div class="panel panel-heading">
                          <h3 class="panel-title">Correspondencia Asignada</h3>
                        </div>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Fecha del Oficio</th>
                                        <th class="text-center">Asunto</th>
                                        <th class="text-center">Área de Procedencia</th>
                                        <th class="text-center">Emisor</th>
                                        <th class="text-center">Fecha de Ingreso</th>
                                        <th class="text-center">Hora de Ingreso</th>
                                        <th class="text-center">Número del Oficio</th>
                                        <th class="text-center">Número de Volante</th>
                                        <th class="text-center">Archivo</th>
                                        <th class="text-center info">Correspondencia De</th>
                                        <th class="text-center info">Respuesta</th>
                                        <th class="text-center info">Num. Sigob</th>
                                        <th class="text-center info">Archivo Respuesta</th>
                                        <th class="text-center">Estatus</th>                                        
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas)
             {
                 $contador=$inicio + 1;

                 foreach ($datos as $rows)
                 {
                     $tabla.='<tr>
                                    <td>'.$contador.'</td>
                                    <td>'.$rows['fecha_oficio'].'</td>
                                    <td>'.utf8_encode($rows['asunto']).'</td>
                                    <td>'.utf8_encode($rows['prosedencia']).'</td>
                                    <td>'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td>'.$rows['fecha_recibido'].'</td>
                                    <td>'.$rows['hora'].'</td>
                                    <td>'.$rows['n_oficio'].'</td>
                                    <td>'.$rows['volante'].'</td>
                                    <td><a target="_blank" href="'.SERVERURL.utf8_encode($rows['archivo']).'">Vista Previa</a></td>';

                                    $compartir2=$rows['compartir2'];
                                    $volante=$rows['volante'];
                      
                       
                          $persona1=$rows['persona'];
                          $accion1=$rows['accion'];
                          $sigob1=$rows['sigob'];
                          $archivorespuesta1=$rows['archivorespuesta'];
                        if($rows['estatus1']=="tramite")
                        {
                            $tabla.='<td>'.utf8_encode($persona1).'</td>';
                            $tabla.='<td> En Tramite </td>';
                            $tabla.='<td> En Tramite </td>';
                            $tabla.='<td> En Tramite </td>';
                            $tabla.='<td><span class="label label-warning">En Tramite</span></td>';        
                        }elseif($rows['estatus1']=="accion")
                        {
                            $tabla.='<td>'.utf8_encode($persona1).'</td>';
                            $tabla.='<td>'.utf8_encode($accion1).'</td>';
                            $tabla.='<td>'.$sigob1.'</td>';
                            $tabla.='<td><a target="_blank" href="'.SERVERURL.utf8_encode($archivorespuesta1).'">Vista Previa</a></td>';
                            $tabla.='<td><span class="label label-danger">Pendiente</span></td>'; 
                        }elseif($rows['estatus1']=="concluido")
                        {
                            $tabla.='<td>'.utf8_encode($persona1).'</td>';
                            $tabla.='<td>'.utf8_encode($accion1).'</td>';
                            $tabla.='<td>'.$sigob1.'</td>';
                            $tabla.='<td><a target="_blank" href="'.SERVERURL.utf8_encode($archivorespuesta1).'">Vista Previa</a></td>';
                            $tabla.='<td><span class="label label-success">Concluido</span></td>'; 
                        } 
                      
                          $tabla.='</tr>';
                     $contador++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                   
                    for ($i=1; $i<=$npaginas; $i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         }
         
         public function paginador_general_administrador_controlador($pagina,$registros,$codigo,$busqueda){
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             
             $busqueda= mainModel::limpiar_cadena($busqueda);
             
             if(isset($busqueda) && $busqueda!=""){
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                          CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                      recepciones.volante,
                                                      recepciones.fecha_oficio,
                                                      recepciones.asunto,
                                                      recepciones.prosedencia,
                                                      recepciones.nombre_prosedencia,
                                                      recepciones.fecha_recibido,
                                                      recepciones.hora,
                                                      recepciones.n_oficio,
                                                      recepciones.archivo,
                                                      atenderbitacora.abcodigo,
                                                      estatus.estatus,
                                                      estatus.sigob,
                                                      estatus.accion,
                                                      estatus.archivorespuesta,
                                                      atenderbitacora.estatus AS estatusantender
                                                      FROM
                                                      recepciones
                                                      INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                      INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                      INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                      WHERE
                                          (recepciones.volante LIKE '%$busqueda%' OR recepciones.fecha_oficio LIKE '%$busqueda%'OR recepciones.n_oficio LIKE '%$busqueda%')
                                          ORDER BY recepciones.volante ASC LIMIT $inicio,$registros";
                 
                                                
                                                $paginaurl="pdfbusqueda";
             }else{
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                                      CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                      recepciones.volante,
                                                      recepciones.fecha_oficio,
                                                      recepciones.asunto,
                                                      recepciones.prosedencia,
                                                      recepciones.nombre_prosedencia,
                                                      recepciones.fecha_recibido,
                                                      recepciones.hora,
                                                      recepciones.n_oficio,
                                                      recepciones.archivo,
                                                      atenderbitacora.abcodigo,
                                                      estatus.estatus,
                                                      estatus.sigob,
                                                      estatus.accion,
                                                      estatus.archivorespuesta,
                                                      atenderbitacora.estatus AS estatusantender
                                                      FROM
                                                      recepciones
                                                      INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                      INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                      INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                      ORDER BY recepciones.volante ASC LIMIT $inicio,$registros";
                 
                                                $paginaurl="pdf";

             }

             $conexion= mainModel::conectar();
             
             $datos= $conexion->query($consulta);
             
             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="panel">
                        <div class="panel panel-heading">
                          <h3 class="panel-title text-warning">Correspondencia Asignada</h3>
                        </div>
                        <div class="panel-body no-padding">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Fecha del Oficio</th>
                                        <th class="text-center">Asunto</th>
                                        <th class="text-center">Área de Procedencia</th>
                                        <th class="text-center">Emisor</th>
                                        <th class="text-center">Fecha de Ingreso</th>
                                        <th class="text-center">Hora de Ingreso</th>
                                        <th class="text-center">Número del Oficio</th>
                                        <th class="text-center">Número de Volante</th>
                                        <th class="text-center">Archivo</th>
                                        <th class="text-center">Comentario</th>
                                        <th class="text-center">Archivo Respuesta</th>
                                        <th class="text-center">No. Sigob</th>
                                        <th class="text-center">Asignado A</th>
                                        <th class="text-center">Estatus</th>
                                   </tr>
                                </thead>
                                <tbody>';

             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                    
                                  <td >'.$contador.'</td>
                                  <td >'.$rows['fecha_oficio'].'</td>
                                  <td >'.utf8_encode($rows['asunto']).'</td>
                                  <td >'.utf8_encode($rows['prosedencia']).'</td>
                                  <td >'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                  <td >'.$rows['fecha_recibido'].'</td>
                                  <td >'.$rows['hora'].'</td>
                                  <td >'.$rows['n_oficio'].'</td>
                                  <td >'.$rows['volante'].'</td>
                                  <td><a target="_blank" href="'.SERVERURL.$rows['archivo'].'">Vista Previa</a></td>';
                                  if($rows['estatus']=="tramite")
                                  {
                                    $tabla.=' <td> N/A </td>
                                              <td> N/A </td>
                                              <td> N/A </td>
                                              <td >'.$rows['persona'].'</td>
                                              <td><span class="label label-danger">En Tramite</span></td>';
                                  }elseif ($rows['estatus']=="accion") {
                                    $tabla.=' <td >'.$rows['accion'].'</td>
                                              <td><a target="_blank" href="'.SERVERURL.$rows['archivorespuesta'].'">Vista Previa</a></td>
                                              <td >'.$rows['sigob'].'</td>
                                              <td >'.$rows['persona'].'</td>';
                                    $tabla.='<td><span class="label label-danger">En Tramite</span></td>';
                                  }
                                  elseif ($rows['estatus']=="concluido") {
                                    $tabla.=' <td >'.$rows['accion'].'</td>
                                              <td><a target="_blank" href="'.SERVERURL.$rows['archivorespuesta'].'">Vista Previa</a></td>
                                              <td >'.$rows['sigob'].'</td>
                                              <td >'.$rows['persona'].'</td>';
                                    $tabla.='<td><span class="label label-success">Concluido</span></td>';
                                  }          
                      $tabla.='</tr>';
                     $contador++;
                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '     </form>'
                     . '  </div>'
                     .'     <div class="panel-footer">
                              <div class="row">
                                <div class="col-md-6"><span class="panel-note"></i> </span></div>
                              </div>
                            </div>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         }
         
         public function paginador_concluido_administrador_controlador($pagina,$registros,$codigo,$busqueda){

             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int)$pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             $busqueda= mainModel::limpiar_cadena($busqueda);
             
             if(isset($busqueda) && $busqueda!=""){
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                            CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                recepciones.id,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                atenderbitacora.abcodigo,
                                                atenderbitacora.compartir AS compartir2,
                                                estatus.estatus AS estatus1,
                                                estatus.accion,
                                                estatus.archivorespuesta,
                                                estatus.sigob
                                                FROM
                                                recepciones
                                                INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                WHERE
                                            ((usuarios.cdcuenta = '$codigo'AND
                                             estatus.estatus = 'concluido') AND (recepciones.volante LIKE '%$busqueda%' 
                                              OR recepciones.fecha_oficio LIKE '%$busqueda%'
                                              OR recepciones.n_oficio LIKE '%$busqueda%' OR recepciones.asunto LIKE '%$busqueda%'
                                              OR recepciones.prosedencia LIKE '%$busqueda%' OR recepciones.nombre_prosedencia LIKE '%$busqueda%'
                                              OR estatus.sigob LIKE '%$busqueda%'))
                                              ORDER BY recepciones.volante ASC LIMIT $inicio,$registros";
                                                
                                                $paginaurl="busquedaconcluido";
             }else{
                 $consulta="SELECT SQL_CALC_FOUND_ROWS
                                                CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona,
                                                recepciones.id,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                atenderbitacora.abcodigo,
                                                atenderbitacora.compartir AS compartir2,
                                                estatus.estatus AS estatus1,
                                                estatus.accion,
                                                estatus.archivorespuesta,
                                                estatus.sigob
                                                FROM
                                                recepciones
                                                INNER JOIN atenderbitacora ON atenderbitacora.volante = recepciones.volante
                                                INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                WHERE
                                                estatus.estatus = 'concluido' AND
                                                usuarios.cdcuenta = '$codigo'
                                                ORDER BY recepciones.volante ASC LIMIT $inicio,$registros";
                 
                                                $paginaurl="pdfconcluido";

             }


             $conexion= mainModel::conectar();
             
             $datos= $conexion->query($consulta);
             
             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();

             $npaginas= ceil($total/$registros);
//             print_r($npaginas);
             $tabla.='<div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Fecha del Oficio</th>
                                        <th class="text-center">Asunto</th>
                                        <th class="text-center">Área de Procedencia</th>
                                        <th class="text-center">Emisor</th>
                                        <th class="text-center">Fecha de Ingreso</th>
                                        <th class="text-center">Hora de Ingreso</th>
                                        <th class="text-center">Número del Oficio</th>
                                        <th class="text-center">Número de Volante</th>
                                        <th class="text-center">Comentario</th>
                                        <th class="text-center">Archivo</th>
                                        <th class="text-center">SIGOB</th>
                                        <th class="text-center">Respuesta</th>
                                        <th class="text-center info" colspan="8">Compartido con</th>
                                        <!--<th class="text-center info">Respuesta</th>
                                        <th class="text-center info">Num. Sigob</th>
                                        <th class="text-center info">Archivo Respuesta</th>-->
                                        
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas)
             {
                 $contador=$inicio + 1;

                 foreach ($datos as $rows)
                 {
                     $tabla.='<tr>
                                    <td>'.$contador.'</td>
                                    <td>'.$rows['fecha_oficio'].'</td>
                                    <td>'.utf8_encode($rows['asunto']).'</td>
                                    <td>'.utf8_encode($rows['prosedencia']).'</td>
                                    <td>'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td>'.$rows['fecha_recibido'].'</td>
                                    <td>'.$rows['hora'].'</td>
                                    <td>'.$rows['n_oficio'].'</td>
                                    <td>'.$rows['volante'].'</td>
                                    <td>'.utf8_encode($rows['accion']).'</td>
                                    <td><a target="_blank" href="'.SERVERURL.utf8_encode($rows['archivo']).'">Vista Previa</a></td>
                                    <td>'.$rows['sigob'].'</td>
                                    <td><a target="_blank" href="'.SERVERURL.utf8_encode($rows['archivorespuesta']).'">Vista Previa</a></td>';

                                    $compartir2=$rows['compartir2'];
                                    $volante=$rows['volante'];
                      $consul= mainModel::ejecutar_consulta_simple("SELECT
                                                                          CONCAT_WS(' ', usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) AS persona1,
                                                                          estatus.estatus AS estatus2,
                                                                          estatus.accion AS accion1,
                                                                          estatus.archivorespuesta AS archivorespuesta1,
                                                                          estatus.sigob AS sigob1
                                                                          FROM
                                                                          atenderbitacora
                                                                          INNER JOIN recepciones ON atenderbitacora.volante = recepciones.volante
                                                                          INNER JOIN usuarios ON atenderbitacora.idusuario = usuarios.idusuario
                                                                          INNER JOIN estatus ON estatus.id = atenderbitacora.id
                                                                          WHERE
                                                                          usuarios.cdcuenta <> '$codigo' AND
                                                                          estatus.estatus = 'concluido' AND
                                                                          atenderbitacora.volante = '$volante'");
                      
                     

                      while($rs = $consul->fetch(PDO::FETCH_ASSOC))
                      { 
                          $persona1=$rs['persona1'];
                          $accion1=$rs['accion1'];
                          $sigob1=$rs['sigob1'];
                          $archivorespuesta1=$rs['archivorespuesta1'];
                        if($rs['estatus2']=="concluido")
                        {
                            $tabla.='<td><div><br>'.utf8_encode($persona1).'<br></div></td>';
                            $tabla.='<td><div><br>'.utf8_encode($accion1).'<br></div></td>';
//                            $tabla.='<td>'.$sigob1.'</td>';
//                            $tabla.='<td><a target="_blank" href="'.SERVERURL.$archivorespuesta1.'">Vista Previa</a></td>';  
                        } 
                      }
                      $tabla.='<td colspan="8" class="text-center">';
                      if($compartir2=="Directa")
                      {       
                        $tabla.='<div> Correspondencia Directa </div>';
                      }
                        $tabla.='</td>';
                          $tabla.='</tr>';
                     $contador++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                   
                    for ($i=1; $i<=$npaginas; $i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         }
                  
         public function paginador_listadorecibido_controlador($pagina,$registros,$codigo){

          $conexion= mainModel::conectar();
             
          $datos= $conexion->query("SELECT      *
                                                FROM
                                                cuentas
                                                WHERE
                                                cuentas.cdcuenta = '$codigo' ");

          $datos= $datos->fetchAll();

          foreach ($datos as $rows){
            $rows['privilegio'];
          }

          if ($rows['privilegio']==="usuario") {

            $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query("SELECT SQL_CALC_FOUND_ROWS
                                                atenderbitacora.fecha,
                                                atenderbitacora.hora,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora AS hora1,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                estatus.estatus,
                                                concat_ws(' ',nombre,apellido_paterno,apellido_materno) AS persona
                                                FROM
                                                usuarios
                                                INNER JOIN atenderbitacora ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                INNER JOIN recepciones ON atenderbitacora.idrecepciones = recepciones.idrecepciones
                                                WHERE
                                                usuarios.cdcuenta = '$codigo' AND
                                                estatus.estatus = 'recibido'
                                                ORDER BY
                                                recepciones.volante ASC
                                                LIMIT $inicio,$registros");

             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Fecha del Oficio</th>
                                    <th class="text-center">Asunto</th>
                                    <th class="text-center">Área de Procedencia</th>
                                    <th class="text-center">Emisor</th>
                                    <th class="text-center">Fecha de Ingreso</th>
                                    <th class="text-center">Hora de Ingreso</th>
                                    <th class="text-center">Número del Oficio</th>
                                    <th class="text-center">Número de Volante</th>
                                    <th class="text-center">Atendido por</th>
                                    <th class="text-center">Fecha de Remisión</th>
                                    <th class="text-center">Hora de Remisión</th>
                                    <th class="text-center">Archivo</th>
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                    
                                    <td>'.$contador.'</td>
                                    <td>'.$rows['fecha_oficio'].'</td>
                                    <td>'.utf8_encode($rows['asunto']).'</td>
                                    <td>'.utf8_encode($rows['prosedencia']).'</td>
                                    <td>'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td>'.$rows['fecha_recibido'].'</td>
                                    <td>'.$rows['hora1'].'</td>
                                    <td>'.$rows['n_oficio'].'</td>
                                    <td>'.$rows['volante'].'</td>
                                    <td>'.$rows['persona'].'</td>
                                    <td>'.$rows['fecha'].'</td>
                                    <td>'.$rows['hora'].'</td>
                                    <td><a target="_blank" href="'.SERVERURL.$rows['archivo'].'">Vista Previa</a></td> 
                                </tr>';
                     $contador++;
                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.'reportesrecibido/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '     </form>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportesrecibido/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.'reportesrecibido/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.'reportesrecibido/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportesrecibido/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         

          }else{

          }
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query("SELECT SQL_CALC_FOUND_ROWS
                                                atenderbitacora.fecha,
                                                atenderbitacora.hora,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora AS hora1,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                estatus.estatus,
                                                concat_ws(' ',nombre,apellido_paterno,apellido_materno) AS persona
                                                FROM
                                                usuarios
                                                INNER JOIN atenderbitacora ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                INNER JOIN recepciones ON atenderbitacora.idrecepciones = recepciones.idrecepciones
                                                WHERE
                                                estatus.estatus = 'recibido'
                                                ORDER BY
                                                recepciones.volante ASC
                                                LIMIT $inicio,$registros");

             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Fecha del Oficio</th>
                                    <th class="text-center">Asunto</th>
                                    <th class="text-center">Área de Procedencia</th>
                                    <th class="text-center">Emisor</th>
                                    <th class="text-center">Fecha de Ingreso</th>
                                    <th class="text-center">Hora de Ingreso</th>
                                    <th class="text-center">Número del Oficio</th>
                                    <th class="text-center">Número de Volante</th>
                                    <th class="text-center">Atendido por</th>
                                    <th class="text-center">Fecha de Remisión</th>
                                    <th class="text-center">Hora de Remisión</th>
                                    <th class="text-center">Archivo</th>
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                    
                                    <td>'.$contador.'</td>
                                    <td>'.$rows['fecha_oficio'].'</td>
                                    <td>'.utf8_encode($rows['asunto']).'</td>
                                    <td>'.utf8_encode($rows['prosedencia']).'</td>
                                    <td>'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td>'.$rows['fecha_recibido'].'</td>
                                    <td>'.$rows['hora1'].'</td>
                                    <td>'.$rows['n_oficio'].'</td>
                                    <td>'.$rows['volante'].'</td>
                                    <td>'.$rows['persona'].'</td>
                                    <td>'.$rows['fecha'].'</td>
                                    <td>'.$rows['hora'].'</td>
                                    <td><a target="_blank" href="'.SERVERURL.$rows['archivo'].'">Vista Previa</a></td> 
                                </tr>';
                     $contador++;
                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.'reportesrecibido/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '     </form>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportesrecibido/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.'reportesrecibido/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.'reportesrecibido/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportesrecibido/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         }
         
         public function paginador_listadotramite_controlador($pagina,$registros,$codigo){
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query("SELECT SQL_CALC_FOUND_ROWS
                                                atenderbitacora.fecha,
                                                atenderbitacora.hora,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora AS hora1,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                estatus.estatus,
                                                concat_ws(' ',nombre,apellido_paterno,apellido_materno) AS persona
                                                FROM
                                                usuarios
                                                INNER JOIN atenderbitacora ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                INNER JOIN recepciones ON atenderbitacora.volante = recepciones.volante
                                                WHERE
                                                usuarios.cdcuenta = '$codigo' AND
                                                estatus.estatus = 'tramite'
                                                ORDER BY
                                                recepciones.volante ASC
                                                LIMIT $inicio,$registros");

             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Fecha del Oficio</th>
                                    <th class="text-center">Asunto</th>
                                    <th class="text-center">Área de Procedencia</th>
                                    <th class="text-center">Emisor</th>
                                    <th class="text-center">Fecha de Ingreso</th>
                                    <th class="text-center">Hora de Ingreso</th>
                                    <th class="text-center">Número del Oficio</th>
                                    <th class="text-center">Número de Volante</th>
                                    <th class="text-center">Atendido por</th>
                                    <th class="text-center">Fecha de Remisión</th>
                                    <th class="text-center">Hora de Remisión</th>
                                    <th class="text-center">Archivo</th>
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                    
                                    <td>'.$contador.'</td>
                                    <td>'.$rows['fecha_oficio'].'</td>
                                    <td>'.utf8_encode($rows['asunto']).'</td>
                                    <td>'.utf8_encode($rows['prosedencia']).'</td>
                                    <td>'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td>'.$rows['fecha_recibido'].'</td>
                                    <td>'.$rows['hora1'].'</td>
                                    <td>'.$rows['n_oficio'].'</td>
                                    <td>'.$rows['volante'].'</td>
                                    <td>'.$rows['persona'].'</td>
                                    <td>'.$rows['fecha'].'</td>
                                    <td>'.$rows['hora'].'</td>
                                    <td><a target="_blank" href="'.SERVERURL.$rows['archivo'].'">Vista Previa</a></td>
                                </tr>';
                     $contador++;
                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.'reportestramite/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '     </form>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportestramite/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.'reportestramite/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.'reportestramite/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportestramite/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         }
         public function paginador_listadotramite_jefe_controlador($pagina,$registros,$codigo){
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query("SELECT SQL_CALC_FOUND_ROWS
                                                atenderbitacora.fecha,
                                                atenderbitacora.hora,
                                                recepciones.volante,
                                                recepciones.fecha_oficio,
                                                recepciones.asunto,
                                                recepciones.prosedencia,
                                                recepciones.nombre_prosedencia,
                                                recepciones.fecha_recibido,
                                                recepciones.hora AS hora1,
                                                recepciones.n_oficio,
                                                recepciones.archivo,
                                                estatus.estatus,
                                                concat_ws(' ',nombre,apellido_paterno,apellido_materno) AS persona
                                                FROM
                                                usuarios
                                                INNER JOIN atenderbitacora ON atenderbitacora.idusuario = usuarios.idusuario
                                                INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                                INNER JOIN recepciones ON atenderbitacora.volante = recepciones.volante
                                                WHERE
                                                estatus.estatus = 'tramite'
                                                ORDER BY
                                                recepciones.volante ASC
                                                LIMIT $inicio,$registros");

             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Fecha del Oficio</th>
                                    <th class="text-center">Asunto</th>
                                    <th class="text-center">Área de Procedencia</th>
                                    <th class="text-center">Emisor</th>
                                    <th class="text-center">Fecha de Ingreso</th>
                                    <th class="text-center">Hora de Ingreso</th>
                                    <th class="text-center">Número del Oficio</th>
                                    <th class="text-center">Número de Volante</th>
                                    <th class="text-center">Atendido por</th>
                                    <th class="text-center">Fecha de Remisión</th>
                                    <th class="text-center">Hora de Remisión</th>
                                    <th class="text-center">Archivo</th>
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                    
                                    <td>'.$contador.'</td>
                                    <td>'.$rows['fecha_oficio'].'</td>
                                    <td>'.utf8_encode($rows['asunto']).'</td>
                                    <td>'.utf8_encode($rows['prosedencia']).'</td>
                                    <td>'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td>'.$rows['fecha_recibido'].'</td>
                                    <td>'.$rows['hora1'].'</td>
                                    <td>'.$rows['n_oficio'].'</td>
                                    <td>'.$rows['volante'].'</td>
                                    <td>'.$rows['persona'].'</td>
                                    <td>'.$rows['fecha'].'</td>
                                    <td>'.$rows['hora'].'</td>
                                    <td><a target="_blank" href="'.SERVERURL.$rows['archivo'].'">Vista Previa</a></td>
                                </tr>';
                     $contador++;
                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.'reportestramite/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '     </form>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportestramite/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.'reportestramite/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.'reportestramite/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportestramite/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
         }
         
         public function paginador_listadoconcluido_controlador($pagina,$registros,$codigo)
         {
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query("SELECT
                                              recepciones.fecha_oficio,
                                              recepciones.asunto,
                                              recepciones.prosedencia,
                                              recepciones.nombre_prosedencia,
                                              recepciones.fecha_recibido,
                                              recepciones.hora as hora1,
                                              recepciones.n_oficio,
                                              recepciones.volante,
                                              recepciones.archivo,
                                              usuarios.idusuario,
                                              atenderbitacora.abcodigo,
                                              atenderbitacora.accionimplementar,
                                              estatus.archivorespuesta,
                                              atenderbitacora.fecha,
                                              atenderbitacora.hora,
                                              estatus.sigob,
                                              estatus.accion,
                                              CONCAT_WS(' ',usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) as persona
                                              FROM
                                              atenderbitacora
                                              INNER JOIN usuarios ON usuarios.idusuario = atenderbitacora.idusuario
                                              INNER JOIN recepciones ON atenderbitacora.volante = recepciones.volante
                                              INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                              WHERE
                                              usuarios.cdcuenta = '$codigo' AND
                                              estatus.estatus = 'concluido'
                                              ORDER BY
                                              recepciones.volante ASC
                                              LIMIT $inicio,$registros");

             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Fecha del Oficio</th>
                                    <th class="text-center">Asunto</th>
                                    <th class="text-center">Área de Procedencia</th>
                                    <th class="text-center">Emisor</th>
                                    <th class="text-center">Fecha de Ingreso</th>
                                    <th class="text-center">Hora de Ingreso</th>
                                    <th class="text-center">Número del Oficio</th>
                                    <th class="text-center">Número de Volante</th>
                                    <th class="text-center">Atendido por</th>
                                    <th class="text-center">Archivo</th>
                                    <th class="text-center">Número SIGOB</th>
                                    <th class="text-center">Comentario</th>
                                    <th class="text-center">Respuesta</th>
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                    
                                    <td class="success">'.$contador.'</td>
                                    <td class="success">'.$rows['fecha_oficio'].'</td>
                                    <td class="success">'.utf8_encode($rows['asunto']).'</td>
                                    <td class="success">'.utf8_encode($rows['prosedencia']).'</td>
                                    <td class="success">'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td class="success">'.$rows['fecha_recibido'].'</td>
                                    <td class="success">'.$rows['hora1'].'</td>
                                    <td class="success">'.$rows['n_oficio'].'</td>
                                    <td class="success">'.$rows['volante'].'</td>
                                    <td class="success">'.$rows['persona'].'</td>
                                    <!--<td>'.$rows['fecha'].'</td>-->
                                    <!--<td>'.$rows['hora'].'</td>-->
                                    <td class="success"><a target="_blank" href="'.SERVERURL.$rows['archivo'].'">Vista Previa</a></td>
                                    <td class="success">'.$rows['sigob'].'</td>
                                    <td class="success">'.utf8_encode($rows['accion']).'</td>
                                    <td class="success"><a target="_blank" href="'.SERVERURL.$rows['archivorespuesta'].'">Vista Previa</a></td>
                                </tr>';
                     $contador++;
                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.'reportesconcluidos/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '     </form>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportesconcluidos/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.'reportestramite/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.'reportesconcluidos/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportesconcluidos/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
          }
          
          public function paginador_concluido_jefe_controlador($pagina,$registros,$codigo)
         {
             $tabla="";

             $pagina= (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
             $inicio= ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
             
             $conexion= mainModel::conectar();
             
             $datos= $conexion->query("SELECT
                                              recepciones.fecha_oficio,
                                              recepciones.asunto,
                                              recepciones.prosedencia,
                                              recepciones.nombre_prosedencia,
                                              recepciones.fecha_recibido,
                                              recepciones.hora as hora1,
                                              recepciones.n_oficio,
                                              recepciones.volante,
                                              recepciones.archivo,
                                              usuarios.idusuario,
                                              atenderbitacora.abcodigo,
                                              atenderbitacora.accionimplementar,
                                              estatus.archivorespuesta,
                                              atenderbitacora.fecha,
                                              atenderbitacora.hora,
                                              estatus.sigob,
                                              estatus.accion,
                                              CONCAT_WS(' ',usuarios.nombre,usuarios.apellido_paterno,usuarios.apellido_materno) as persona
                                              FROM
                                              atenderbitacora
                                              INNER JOIN usuarios ON usuarios.idusuario = atenderbitacora.idusuario
                                              INNER JOIN recepciones ON atenderbitacora.volante = recepciones.volante
                                              INNER JOIN estatus ON estatus.abcodigo = atenderbitacora.abcodigo
                                              WHERE
                                              estatus.estatus = 'concluido'
                                              ORDER BY
                                              recepciones.volante ASC
                                              LIMIT $inicio,$registros");

             $datos= $datos->fetchAll();
             
             $total= $conexion->query("SELECT FOUND_ROWS()");
             $total= (int)$total->fetchColumn();
             
             $npaginas= ceil($total/$registros);
             
             $tabla.='<div class="table-responsive">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Fecha del Oficio</th>
                                    <th class="text-center">Asunto</th>
                                    <th class="text-center">Área de Procedencia</th>
                                    <th class="text-center">Emisor</th>
                                    <th class="text-center">Fecha de Ingreso</th>
                                    <th class="text-center">Hora de Ingreso</th>
                                    <th class="text-center">Número del Oficio</th>
                                    <th class="text-center">Número de Volante</th>
                                    <th class="text-center">Atendido por</th>
                                    <th class="text-center">Archivo</th>
                                    <th class="text-center">Número SIGOB</th>
                                    <th class="text-center">Comentario</th>
                                    <th class="text-center">Respuesta</th>
                                   </tr>
                                </thead>
                                <tbody>';
             
             if($total>=1 && $pagina<=$npaginas){
                 $contador=$inicio + 1;
                 $i=1;
                 foreach ($datos as $rows){
                     $tabla.='<tr>
                                    
                                    <td class="success">'.$contador.'</td>
                                    <td class="success">'.$rows['fecha_oficio'].'</td>
                                    <td class="success">'.utf8_encode($rows['asunto']).'</td>
                                    <td class="success">'.utf8_encode($rows['prosedencia']).'</td>
                                    <td class="success">'.utf8_encode($rows['nombre_prosedencia']).'</td>
                                    <td class="success">'.$rows['fecha_recibido'].'</td>
                                    <td class="success">'.$rows['hora1'].'</td>
                                    <td class="success">'.$rows['n_oficio'].'</td>
                                    <td class="success">'.$rows['volante'].'</td>
                                    <td class="success">'.$rows['persona'].'</td>
                                    <td class="success"><a target="_blank" href="'.SERVERURL.$rows['archivo'].'">Vista Previa</a></td>
                                    <td class="success">'.$rows['sigob'].'</td>
                                    <td class="success">'.utf8_encode($rows['accion']).'</td>
                                    <td class="success"><a target="_blank" href="'.SERVERURL.$rows['archivorespuesta'].'">Vista Previa</a></td>
                                </tr>';
                     $contador++;
                     $i++;
                 }
             } else {
                    if($total>=1){
                          $tabla.='
                          <tr>
                          <td colspan="5">
                          <a href="'.SERVERURL.'reportesconcluidos/" class="btn btn-sm btn-info btn-raised">
                                Haga clic aca para recargar el listado
                          </a>
                          </td>
                          </tr>';
                    }else{
                         $tabla.='
                          <tr>
                          <td colspan="5">No hay registros en el sistema</td>
                          </tr>';
                    }
                       
             }
             
             $tabla.='          </tbody>'
                     . '    </table>'
                     . '     </form>'
                     . '</div>';
             
             if($total>=1 && $pagina<=$npaginas){
                    $tabla.='<nav class="text-center"><ul class="pagination pagination-sm">';
                    
                    if($pagina==1){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportesconcluidos/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
                    }
                    
                    for ($i=1;$i<=$npaginas;$i++){
                        if($pagina==$i){
                            $tabla.='<li class="active"><a href="'.SERVERURL.'reportestramite/'.$i.'/">'.$i.'</a></li>';
                        } else {
                                $tabla.='<li><a href="'.SERVERURL.'reportesconcluidos/'.$i.'/">'.$i.'</a></li>';
                        }
                    }
                    
                    if($pagina==$npaginas){
                        $tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }else{
                        $tabla.='<li><a href="'.SERVERURL.'reportesconcluidos/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
                    }
                    
                    $tabla.='</ul></nav>';
             }
             
             return $tabla;
          }

        public function datos_administrador_controlador($tipo,$id){
//            $codigo= mainModel::decryption($codigo);
            $id= mainModel::decryption($id);
//            $abcodigo=mainModel::decryption($abcodigo);

            return administradorModelo::datos_administrador_modelo($tipo,$id);
        }
        
        public function datos_archivo_controlador($tipo,$volante){
            $volante= mainModel::decryption($volante);
            return administradorModelo::datos_actualizar_modelo($tipo,$volante);
        }
         
         public function notificacionescontrolador($abcodigo){
             $datos=[
               "abcodigo"=>$abcodigo,
               "leido"=>"leido"  
             ];
            administradorModelo::notificacionesmodelo($datos);
         }
      }