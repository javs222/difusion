<?php
    if($peticionAjax){
         require_once "../nucleo/mainModel.php";
     }else {
         require_once "./nucleo/mainModel.php";
     }
     
     class seccionesModelo extends mainModel{
         protected function agregar_contenido_modelo($datos){
             $sql= mainModel::conectar()->prepare("INSERT INTO contenidos(text,link,archivo,pdf_imagen,tipo,fecha_inicio,fecha_fin,idsecciones) "
                     . "VALUES(:texto,:link,:archivo,:pdfimg,:tipo,:finicio,:ffinal,:idsecciones)");
                          
             $sql->bindParam(":texto", $datos['texto']);
             $sql->bindParam(":link", $datos['link']);
             $sql->bindParam(":pdfimg", $datos['pdfimg']);
             $sql->bindParam(":finicio", $datos['finicio']);
             $sql->bindParam(":ffinal", $datos['ffinal']);
             $sql->bindParam(":idsecciones", $datos['idsecciones']);
             $sql->bindParam(":archivo", $datos['archivo']);
             $sql->bindParam(":tipo", $datos['tipo']);
             $sql->execute();
//             print_r($sql->errorInfo());
//        print_r($datos['finicio']);
//        print_r($datos['ffinal']);
             return $sql;
         }
         
     }