<?php
if($peticionAjax){
         require_once "../modelos/edicionseccionesModelo.php";
    }else 
        {
         require_once "./modelos/edicionseccionesModelo.php";
    }
    
class edicionseccionesControlador extends actualizarModelo{

    public function edicion_secciones(){
        
    $texto=$_POST['texto'];
    $textooriginal=$_POST['textooriginal'];
    $url=$_POST['url'];
    $link=$_POST['link'];
    $linkoriginal=$_POST['linkoriginal'];
    $pdfimg=$_FILES['pdfimg'];
    $pdfimgoriginal=$_POST['pdfimgoriginal'];
    $finicio=$_POST['fecha_inicio'];
    $ffinal=$_POST['fecha_final'];
    $finiciooriginal=$_POST['fecha_inicio_original'];
    $ffinaloriginal=$_POST['fecha_final_original'];
    $tituloseccion=$_POST['tituloseccion'];
    $tituloriginal=$_POST['tituloriginal'];
    $idseccion=  mainModel::decryption($_GET['idseccion']);  
    $fechaactual= date("d/m/Y");
    
    $separa = explode('/',$finicio);
    $dia = $separa[0];
    $mes = $separa[1];
    $anio = $separa[2];

    $ffsepara = explode('/',$ffinal);
    $diaf = $ffsepara[0];
    $mesf = $ffsepara[1];
    $aniof = $ffsepara[2];

    $actualsepara = explode('/',$fechaactual);
    $diaact = $actualsepara[0];
    $mesact = $actualsepara[1];
    $anioact = $actualsepara[2];
            
                if($tituloseccion==="")
                {
                    $alerta = [
                       "Alerta"=>"simple2",
                       "Titulo"=>"Oh, No!",
                       "Texto"=>"Debes de ingresar un título",
                       "Tipo"=>"info"
                    ];
                }else 
                {
                    if($texto==="")
                    {
                        $alerta = [
                           "Alerta"=>"simple2",
                           "Titulo"=>"Oh, No!",
                           "Texto"=>"Debes de ingresar texto",
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
                                if($ffinal === "")
                                {
                                    $alerta = [
                                       "Alerta"=>"simple2",
                                       "Titulo"=>"Oh, No!",
                                       "Texto"=>"La fecha final no debe estar vacío",
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
                                        if($link==""){
                                            $url="";
                                        }

                                        if($tituloseccion != $tituloriginal || $texto != $textooriginal || $link != $linkoriginal || $pdfimg != $pdfimgoriginal || $finicio != $finiciooriginal || $ffinal != $ffinaloriginal)
                                        {
                                            $datostitulo=[
                                                "tituloseccion"=> utf8_encode($tituloseccion),
                                                "idseccion"=>$idseccion
                                            ];

                                            $guardarrespuesta1= actualizarModelo::actualizar_modelo($datostitulo);

                                            $archivo=$_FILES['pdfimg']['tmp_name'];    
                                            $tamanio=$_FILES['pdfimg']['size'];
                                            $tipo=$_FILES['pdfimg']['type'];
                                            $nombre=$_FILES['pdfimg']['name'];

                                            $nombre= utf8_encode($nombre);
                    //
                                            $fp= fopen($archivo, "r+b");
                                            $contenido= fread($fp, filesize($archivo));
                                            fclose($fp);

//                                            if($finicio===""){
//                                                $finicio=$fechaactual= date("d/m/Y");
//                                            }elseif($ffinal===""){
//                                                $ffinal=$fechaactual= date("d/m/Y");
//                                            }


                                            $datoscontenido2=[
                                                "texto"=>  utf8_encode($texto),
                                                "link"=>$url.$link,
                                                "archivo"=>$nombre,
                                                "pdfimg"=>$contenido,
                                                "tipo"=>$tipo,
                                                "finicio"=>$finicio,
                                                "ffinal"=>$ffinal,
                                                "idsecciones"=>$idseccion
                                            ];

                                          $contenidos2= mainModel::actualizar_contenido2($datoscontenido2);

                                            $alerta = [
                                                        "Alerta"=>"edicion",
                                                        "Titulo"=>"Registrado",
                                                        "Texto"=>"Actualización exitosa en el sistema",
                                                        "Tipo"=>"success"
                                                      ];

                                        }else 
                                        {
                //                                $datostitulo=[
                //                                    "tituloseccion"=>$tituloriginal,
                //                                    "idseccion"=>$idseccion
                //                                ];
                //
                //                              $guardarrespuesta= actualizarModelo::actualizar_modelo($datostitulo);

                                            $alerta = [
                                                "Alerta"=>"edicion",
                                                "Titulo"=>"Modificado",
                                                "Texto"=>"La información ha sido guardada",
                                                "Tipo"=>"success"
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
}
