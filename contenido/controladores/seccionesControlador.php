<!--<script>
$(document).ready(function() {
  $('#correspondencia').click(function() {
    // defines un arreglo
    var selected = [];
    $(":radio[name=radio]").each(function() {
      if (this.checked) {
        // agregas cada elemento.
        selected.push($(this).val());
        
      }
      
    });
    
//    if (selected.length) {

      $.ajax({
//        cache: false,
        type: 'POST',
//        dataType: 'json', // importante para que 
        data: { 'selected' : selected }, // jQuery convierta el array a JSON
//        url: '<?ph //echo SERVERURL; ?>controladores/envioControlador.php',
//        success: function(data) {
//          alert('datos enviados');
//        }
      });
      
      console.log(selected);
      // esto es solo para demostrar el json,
      // con fines didacticos
//      alert(JSON.stringify(selected));

//    } else
//      alert('Debes seleccionar al menos una opción.');
//
//    return false;
        return selected;
  });
  
});
</script>-->
<?php
//$codigo=$_SESSION['cdcuenta_ssc'];
    if($peticionAjax){
         require_once "../modelos/seccionesModelo.php";
     }else {
         require_once "./modelos/seccionesModelo.php";
     }
     
     //contralador para agregar administrador
     class seccionesControlador extends seccionesModelo{
        public function agregar_secciones_controlador($codigo){
//            $finicio= $_POST['fecha_inicio'];
//            $finicio= strtotime($finicio);
//            $finicio= date('d/m/Y', $finicio);
            $seccion= mainModel::limpiar_cadena($_POST['seccion']);
            $tiposeccion= mainModel::limpiar_cadena($_POST['tipo_seccion']);
            $prioridad="";
//            $prioridad= mainModel::limpiar_cadena($_POST['prioridad']);
//            $texto= mainModel::limpiar_cadena($_POST['texto']);
//            $link= mainModel::limpiar_cadena($_POST['link']);
//            $f_final= $_POST['fecha_final'];
//            $f_final= strtotime($f_final);
//            $f_final= date('d/m/Y', $f_final);
//            $pdfimg=($_FILES['pdfimg']);
                          
            if($tiposeccion === "")
            {
                $alerta = [
                   "Alerta"=>"simple2",
                   "Titulo"=>"Oh, No!",
                   "Texto"=>"Debes asignar un menú al título",
                   "Tipo"=>"info"
                ];
            }else
            {
                if($seccion === "")
                {
                    $alerta = [
                       "Alerta"=>"simple2",
                       "Titulo"=>"Oh, No!",
                       "Texto"=>"El campo título no debe ir  vacío",
                       "Tipo"=>"info"
                    ];
                }else
                {
//                    if($prioridad === "")
//                    {
//                        $alerta = [
//                           "Alerta"=>"simple",
//                           "Titulo"=>"Ocurrio un error inesperado",
//                           "Texto"=>"El campo prioridad no debe estar vacío",
//                           "Tipo"=>"error"
//                        ];
//                    }else
//                    {
                        
//                        ($cta_admin==1)?'checked':'';
//                        if($textolink === "")
//                        {
//                            $alerta = [
//                               "Alerta"=>"simple",
//                               "Titulo"=>"Ocurrio un error inesperado",
//                               "Texto"=>"El campo texto o link no debe estar vacío",
//                               "Tipo"=>"error"
//                            ];
//                        }else
//                        {
//                            if($pdfimg === "")
//                            {
//                                $alerta = [
//                                   "Alerta"=>"simple",
//                                   "Titulo"=>"Ocurrio un error inesperado",
//                                   "Texto"=>"El campo documento pdf o imagen no debe estar vacío",
//                                   "Tipo"=>"error"
//                                ];
//                            }else
//                            {
//                                if($finicio == "")
//                                {
//                                    $alerta = [
//                                       "Alerta"=>"simple",
//                                       "Titulo"=>"Ocurrio un error inesperado",
//                                       "Texto"=>"El campo fecha inicial no debe estar vacío",
//                                       "Tipo"=>"error"
//                                    ];
//                                }else
//                                {
//                                    if($f_final == "")
//                                    {
//                                        $alerta = [
//                                           "Alerta"=>"simple",
//                                           "Titulo"=>"Ocurrio un error inesperado",
//                                           "Texto"=>"El campo fecha final no debe estar vacío",
//                                           "Tipo"=>"error"
//                                        ];
//                                    }else
//                                    {
                                        $consulta= mainModel::ejecutar_consulta_simple("SELECT nombre FROM secciones WHERE "
                                        . "nombre='$seccion'");
                                        
                                        if($consulta->rowCount()>=1)
                                        {
                                            $alerta = [
                                               "Alerta"=>"simple2",
                                               "Titulo"=>"Oh, No!",
                                               "Texto"=>"el titulo que acabas de asignar al menú, ya se encuentra registrado en el sistema",
                                               "Tipo"=>"info"
                                            ]; 
                                        }else
                                        {
                                            $consulta2= mainModel::ejecutar_consulta_simple("SELECT idsecciones FROM secciones");
                                            $numero=($consulta2->rowCount())+1;
//                                            $cdsecciones= mainModel::generar_codigo_aleatorio("CDS",10,$numero);//CDS Codigo de secciones
                                                  
                                            $fechaactual= date("d/m/Y");
                                            $horaactual= date("h:i:s a");
                                            
                                            $seccion=[
                                                "seccion"=> utf8_encode($seccion),
                                                "tipo"=>$tiposeccion,
                                                "prioridad"=> $prioridad,
                                                "cdcuenta"=> $codigo,
                                                "fecha"=> $fechaactual,
                                                "hora"=> $horaactual,
                                                "estatus"=>1
                                            ];

                                            $guardarseccion=mainModel::agregar_secciones($seccion);
//                                            print_r($guardarseccion);
                                            if($guardarseccion->rowCount()>=1)
                                            {
                                                                                                   
//                                                $archivo=$_FILES['pdfimg']['tmp_name'];    
//                                                $tamanio=$_FILES['pdfimg']['size'];
//                                                $tipo=$_FILES['pdfimg']['type'];
//                                                $nombre=$_FILES['pdfimg']['name'];
//
//                                                $nombre=  utf8_decode($nombre);
//
//                                                $fp= fopen($archivo, "r+b");
//                                                $contenido= fread($fp, filesize($archivo));
//                                                fclose($fp);
//                                                
//                                                $contenidosecciones=[
//                                                    "texto"=>utf8_decode($texto),
//                                                    "link"=>$link,
//                                                    "archivo"=>$nombre,
//                                                    "pdfimg"=>$contenido,
//                                                    "tipo"=>$tipo,
//                                                    "finicio"=>$finicio,
//                                                    "ffinal"=>$f_final,
//                                                    "cdsecciones"=>$cdsecciones
//                                                ];
//
//                                                     $guardarcontenido= seccionesModelo::agregar_contenido_modelo($contenidosecciones);
                                                     
//                                                if($guardarcontenido->rowCount()>=1)
//                                                {
                                                    $alerta = [
                                                         "Alerta"=>"limpiar",
                                                         "Titulo"=>"Registrado",
                                                         "Texto"=>"Se registro con exito en el sistema",
                                                         "Tipo"=>"success"
                                                    ];

//                                                }else
//                                                {
//                                                    mainModel::eliminar_seccion($cdsecciones);
//                                                    mainModel::eliminar_contenido($cdsecciones);
//                                                    $alerta = [
//                                                       "Alerta"=>"simple",
//                                                       "Titulo"=>"Ocurrio un error",
//                                                       "Texto"=>"No registrado el Documento",
//                                                       "Tipo"=>"error"
//                                                    ];
//
//                                                }
                                            }else
                                            {
                                                mainModel::eliminar_seccion($volante);
                                                $alerta = [
                                                   "Alerta"=>"simple",
                                                   "Titulo"=>"Ocurrio un error inesperado",
                                                   "Texto"=>"No se registro el menú y el título seleccionados",
                                                   "Tipo"=>"error"
                                                ]; 
                                            } 
                                        }
//                                    }//
//                                }//
//                            }/**/
//                        }/**/
//                    }
                }
            }
             return mainModel::sweet_alert($alerta);
         }
         
         public function agregar_contenido_controlador(){
//            $idsecciones=$_GET['id'];
//            $titulo=$_GET['titulo'];
//            $cdsecciones=  mainModel::decryption($cdsecciones); 
             
            $finicio= $_POST['fecha_inicio'];
            $f_final= $_POST['fecha_final'];
            $idsecciones=$_POST['secciones'];
//            $finicio= strtotime($finicio);
//            $finicio= date('d/m/Y', $finicio);
//            $seccion= mainModel::limpiar_cadena($_POST['seccion']);
//            $tiposeccion= mainModel::limpiar_cadena($_POST['tipo_seccion']);
//            $prioridad= mainModel::limpiar_cadena($_POST['prioridad']);
            $texto= mainModel::limpiar_cadena($_POST['texto']);
            $link= mainModel::limpiar_cadena($_POST['link']);
            $url= mainModel::limpiar_cadena($_POST['url']);
            $fechaactual= date("d/m/Y");
            
            $separa = explode('/',$finicio);
            $dia = $separa[0];
            $mes = $separa[1];
            $anio = $separa[2];
            
            $ffsepara = explode('/',$f_final);
            $diaf = $ffsepara[0];
            $mesf = $ffsepara[1];
            $aniof = $ffsepara[2];
            
            $actualsepara = explode('/',$fechaactual);
            $diaact = $actualsepara[0];
            $mesact = $actualsepara[1];
            $anioact = $actualsepara[2];
            
                        
            
//            $f_final= strtotime($f_final);
//            $f_final= date('d/m/Y', $f_final);
            $pdfimg=$_FILES['pdfimg'];
            
//            print_r($url.$link);
//        print_r($idsecciones);
        if($idsecciones === "")
        {
            $alerta = [
               "Alerta"=>"simple2",
               "Titulo"=>"Oh, No!",
               "Texto"=>"Debes seleccionar un título para asignarle contenido",
               "Tipo"=>"info"
            ];
        }else
        {
            if($texto === "")
            {
                $alerta = [
                   "Alerta"=>"simple2",
                   "Titulo"=>"Oh, No!",
                   "Texto"=>"Debes de ingresar un texto",
                   "Tipo"=>"info"
                ];
            }else
            {
                if($finicio === "")
                {
                    $alerta = [
                       "Alerta"=>"simple2",
                       "Titulo"=>"Oh, No!",
                       "Texto"=>"Debes de ingresar una fecha de inicio",
                       "Tipo"=>"info"
                    ];
                }else
                {
                    if($dia<$diaact AND $mes<=$mesact AND $anio<=$anioact)
                    {
                        $alerta = [
                               "Alerta"=>"simple2",
                               "Titulo"=>"Oh, No!",
                               "Texto"=>"La fecha inicial debe ser mayor a la actual",
                               "Tipo"=>"info"
                            ];
                    }else
                    {
                        if($f_final === "")
                        {
                            $alerta = [
                               "Alerta"=>"simple2",
                               "Titulo"=>"Oh, No!",
                               "Texto"=>"Debes ingresar una fecha final",
                               "Tipo"=>"info"
                            ];
                        }else
                        {
                            if($diaf<$diaact AND $mesf<=$mesact AND $aniof<=$anioact)
                            {
                                $alerta = [
                                   "Alerta"=>"simple2",
                                   "Titulo"=>"Oh, No!",
                                   "Texto"=>"La fecha de termino debe ser mayor a la actual",
                                   "Tipo"=>"info"
                                ];
                            }else
                            {
                                $tipo=$_FILES['pdfimg']['type'];
                                if($tipo!="application/pdf" || $tipo=='image/png' || $tipo=='image/jpg' || $tipo=='image/jpeg' || $tipo=='image/tiff' || $tipo=='image/gif')
                                {
                                    $alerta = [
                                       "Alerta"=>"simple2",
                                       "Titulo"=>"Oh, No!",
                                       "Texto"=>"Debes de ingresar un archivo válido",
                                       "Tipo"=>"info"
                                    ];
                                }else
                                {
                        
                                    $consulta= mainModel::ejecutar_consulta_simple("SELECT idsecciones FROM contenidos WHERE "
                                    . "idsecciones='$idsecciones'");

                                    if($consulta->rowCount()>=1)
                                    {
                                        $alerta = [
                                           "Alerta"=>"simple",
                                           "Titulo"=>"Ocurrio un error inisperado",
                                           "Texto"=>"El título que acabas de ingresar ya cuenta con un contenido",
                                           "Tipo"=>"error"
                                        ]; 
                                    }else
                                    {                                                                               
                                        $archivo=$_FILES['pdfimg']['tmp_name'];    
                                        $tamanio=$_FILES['pdfimg']['size'];
                                        $tipo=$_FILES['pdfimg']['type'];
                                        $nombre=$_FILES['pdfimg']['name'];

                                        $nombre= utf8_encode($nombre);

                                        $fp= fopen($archivo, "r+b");
                                        $contenido= fread($fp, filesize($archivo));
                                        fclose($fp);

                                        if($link==""){
                                            $url="";
                                        }

                                        $contenidosecciones=[
                                            "texto"=>  utf8_encode($texto),
                                            "link"=>$url.$link,
                                            "archivo"=>$nombre,
                                            "pdfimg"=>$contenido,
                                            "tipo"=>$tipo,
                                            "finicio"=>$finicio,
                                            "ffinal"=>$f_final,
                                            "idsecciones"=>$idsecciones
                                        ];
                                             $guardarcontenido= seccionesModelo::agregar_contenido_modelo($contenidosecciones);

                                        if($guardarcontenido->rowCount()>=1)
                                        {
                                            $alerta = [
                                                 "Alerta"=>"limpiar",
                                                 "Titulo"=>"Registrado",
                                                 "Texto"=>"Contenido guardado con exito en el sistema",
                                                 "Tipo"=>"success"
                                            ];

                                        }else
                                        {
                    //                        mainModel::eliminar_seccion($cdsecciones);
                    //                        mainModel::eliminar_contenido($cdsecciones);
                                            $alerta = [
                                               "Alerta"=>"simple",
                                               "Titulo"=>"Ocurrio un error",
                                               "Texto"=>"No se registro el contenido",
                                               "Tipo"=>"error"
                                            ];

                                        }
                                    }//
                                }
                            }
                        }
                    }
                }
            }
        }
             return mainModel::sweet_alert($alerta);
         }
         
        public function agregar_tiposecciones_controlador(){
            
            $seccion= mainModel::limpiar_cadena($_POST['tipo_seccion']);
                          
            if($seccion === "")
            {
                $alerta = [
                   "Alerta"=>"simple2",
                   "Titulo"=>"¡Oh, No!",
                   "Texto"=>"El campo menú a ingresar no debe estar vacío",
                   "Tipo"=>"info"
                ];
            }else
            {
                $consulta= mainModel::ejecutar_consulta_simple("SELECT
                                                                        tiposecciones.tiposeccion
                                                                        FROM
                                                                        tiposecciones
                                                                        WHERE
                                                                        tiposecciones.tiposeccion = '$seccion'");

                if($consulta->rowCount()>=1)
                {
                    $alerta = [
                       "Alerta"=>"simple2",
                       "Titulo"=>"¡Oh, No!",
                       "Texto"=>"El menú que acabas de ingresar ya se encuentra registrado en el sistema",
                       "Tipo"=>"info"
                    ]; 
                }else
                {
//                    $consulta2= mainModel::ejecutar_consulta_simple("SELECT idsecciones FROM secciones");
//                    $numero=($consulta2->rowCount())+1;
//                    $cdsecciones= mainModel::generar_codigo_aleatorio("CDS",10,$numero);//CDS Codigo de secciones
//
//                    $fechaactual= date("d-m-Y h:i:s a");
//                    $horaactual= date("h:i:s a");

                    $seccion=[
                        "seccion"=> utf8_encode($seccion),
                        "estatus"=> '1'
//                        "prioridad"=> $prioridad,
//                        "cdcuenta"=> $codigo,
//                        "fecha"=> $fechaactual,
//                        "hora"=> $horaactual,
//                        "cdsecciones"=>$cdsecciones
                    ];

                    $guardarseccion=mainModel::agregar_tiposecciones($seccion);
                    //print_r($guardarseccion);
                    if($guardarseccion->rowCount()>=1)
                    {
                            $alerta = [
                                 "Alerta"=>"limpiar",
                                 "Titulo"=>"Registrado",
                                 "Texto"=>"El nuevo menú se guardado con exito en el sistema",
                                 "Tipo"=>"success"
                            ];
                    }else
                    {
//                        mainModel::eliminar_seccion($volante);
                        $alerta = [
                           "Alerta"=>"simple",
                           "Titulo"=>"Ocurrio algo inesperado",
                           "Texto"=>"No se registro el menú",
                           "Tipo"=>"error"
                        ]; 
                    } 
                }
            }
             return mainModel::sweet_alert($alerta);
         }
    }