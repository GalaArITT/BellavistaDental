<?php 
include('conexion.php');

$sql="select * from recetas";
$result =mysql_query($sql);
while($array=mysql_fetch_assoc($result))
{
$arreglo[]=$array;
}


echo("<table>
	   <thead>
 <tr>
	<th>Fecha</th>
	<th>Paciente</th>
  <th>Imprimir</th>
	   </thead>
</tr>");

foreach ($arreglo as $row) {
    echo "<tr>
      <td>" . $row['fecha'] . "</td>
      <td>" . $row['paciente'] . "</td>
       ";

   
    echo("<td>
      <a href='receta/".$row['ruta']."'>Imprimir</a></td>
      </tr>");

}
echo("</table>");
?>
