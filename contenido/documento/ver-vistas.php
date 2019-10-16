<?php

const METHOD="AES-256-CBC";
const SECRET_KEY='$SR@2018';
const SECRET_IV='101712';

class mainModel2{
    public function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output= openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
    //                 $output= base64_decode($output);
        return $output;
    }
}

$idseccion=$_GET['id'];
$idcon=$_GET['idcon'];

$idcon=  mainModel2::decryption($idcon);
$idseccion=  mainModel2::decryption($idseccion);

$pdo= mysqli_connect ("localhost", "root", "", "secciones2");
$sql = "SELECT * FROM contenidos WHERE idsecciones='$idseccion' AND idcontenidos='$idcon'";
$result = mysqli_query($pdo, $sql);
   foreach($result as $row){ 
       $pdf=$row['pdf_imagen'];
       $tipo=$row['tipo'];
       
       
//        header("Content-Type: image/png");
       // header('Content-Disposition: inline; filename="'.$nombre.'"');
        
  } 
    header("Content-Type: $tipo");
    echo $pdf;
    
?>