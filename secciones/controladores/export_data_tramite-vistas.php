<?php
header('Content-Type: application/xls; charset="UTF-8');

header('Content-Disposition: attachment; filename=listadotratime.xls');
header('Pragma: no-cache');
header('Expires: 0');
$codigo=$_GET['codigo'];
//$num=$_GET['num'];
//print_r($num);
//
//export.php  
$connect = mysqli_connect("10.11.24.69", "aldo", "12345678", "censo");
$output = '';
if(isset($_POST["export"]))
{
    
    
$query = "SELECT * ";
 
 $result = mysqli_query($connect, $query);
 $contador=0;
 $contador=$contador + 1;
 if(mysqli_num_rows($result)>0)
 {
//  $output .= '
?>
   <table width="80%" bordered="2" align="center">  
                    <tr bgcolor="#5970B2" align="center">
                        <th>#</th>
                        <th>Fecha del Oficio</th>
                        <th>Asunto</th>
                        <th>Área de Procedencia</th>
                        <th>Emisor</th>
                        <th>Fecha de Ingreso</th>
                        <th>Hora de Ingreso</th>
                        <th>Número del Oficio</th>
                        <th>Número de Volante</th>
                        <th>Atendido por</th>
                    </tr>
<?php
//  ';
  while($rows = mysqli_fetch_array($result))
  {
//   $output .= '
?>
    <tr align="center">
        <td><?php echo $contador; ?></td>
        <td><?php echo $rows['fecha_oficio']; ?></td>
        <td><?php echo $rows['asunto']; ?></td>
        <td><?php echo $rows['prosedencia']; ?></td>
        <td><?php echo $rows['nombre_prosedencia']; ?></td>
        <td><?php echo $rows['fecha_recibido']; ?></td>
        <td><?php echo $rows['hora']; ?></td>
        <td><?php echo $rows['n_oficio']; ?></td>
        <td><?php echo $rows['volante']; ?></td>
        <td><?php echo $rows['persona']; ?></td>
    </tr>
   <!--';-->
<?php
   $contador++;
  }
//  $output .= ' 
?>
          </table>
<?php
//          ';
  echo $output;
 }
}
?>