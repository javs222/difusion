<?php
class vistasModelo{
    protected function obtener_vistas_modelo($vistas){
        $listaBlanca = ["secciones","home","contenidos","resueltopdf",
            "admin","adminlist","contenido","pdf","pdftramite","pdfconcluido",
            "contenidotramite","contenidoconcluido","contrasenia","respuestas",
            "reportesrecibido","reportesconcluidos","reportestramite","areas",
            "recuperar","pdfbusqueda","busqueda","leer","accion","ingreso",
            "directorbusqueda","instruccion","pdfaccion","actualizarpdf","actualizarpdfbusqueda",
            "subirarchivo","busquedaconcluido","busquedatramite","expor_data_tramite","expor_data_concluido",
            "vistageneral","busquedageneral","modificar","concluidosjefe","reportestramitejefe","tiposecciones",
            "edicionsecciones","edicion","actualizaradminlist"];
        if(in_array($vistas, $listaBlanca)){
            if(is_file("./vistas/contenidos/".$vistas."-vistas.php")){
                $contenido = "./vistas/contenidos/".$vistas."-vistas.php";
            }else{
                $contenido = "login";
            }
        }elseif($vistas=="login"){
            $contenido = "login";
        }elseif ($vistas=="index") {
            $contenido="login";
         }else{
             $contenido="404";
         }
         return $contenido;
    }
}

