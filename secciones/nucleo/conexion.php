<?php

//$servername="10.11.24.125";
//$username="aldo";
//$password="12345678";
//$schema="censo";
//
//$conn=new mysqli($servername, $username, $password, $schema);
//if($conn -> connect_error){
//	die($conn -> connect_error);
//}
 
function Conectar (){
 $conexion = null;
 $host = 'localhost';
 $db = 'secciones';
 $user = 'root';
 $pwd = '';
 try {
 $conexion = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
 }
 catch (PDOException $e) {
 echo '<p>No se puede conectar a la base de datos !!</p>';
 exit;
 }
 return $conexion;
}
?>