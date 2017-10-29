<?php
error_reporting(E_ERROR|E_PARSE);
include ('conexion.php');
?>
<h2>Consultas asignadas</h2>

<!--select fecha, hora, nombre_dentista, asunto
from citas
inner join dentistas on dentistas.idDentistas=citas.idDentistas
where idPacientes=".$_SESSION['idPacientes']." and status='activa'

$sql="SELECT fecha, hora, pac_nombre, asunto
from citas, pacientes
WHERE citas.idPacientes = pacientes.idPacientes
and citas.idDentistas=2 and status='activa' ";
-->
<?php
$sql="SELECT fecha, hora, pac_nombre, asunto
from citas
inner join pacientes on citas.idPacientes = pacientes.idPacientes
where idDentistas=2 and status='activa' ";
// necesito hacer la consulta haciendo que el dentista logueado vea los pacientes registrados
//where idDentistas=".$_SESSION['idDentistas']." and status='activa' ";
$result=mysql_query($sql);
while($array=mysql_fetch_array($result)){
    $arreglo[]=$array;
}
echo("<table>
	   <thead>
 <tr>
    <th>Fecha</th>
	<th>Hora</th>
	<th>Paciente</th>
	<th>Asunto</th>
	   </thead>
</tr>");
foreach ($arreglo as $row){
    echo "<tr>
      <td>".$row['fecha']."</td>
      <td>".$row['hora']."</td>
      <td>".$row['pac_nombre']."</td>
      <td>".$row['asunto']."</td>";
    echo("</tr>");
}
echo("</table>");
?>


