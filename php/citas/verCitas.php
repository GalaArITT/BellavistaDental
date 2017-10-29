<?php
error_reporting(E_ERROR|E_PARSE);
include ('conexion.php');
?>
<h2>Tus Citas</h2>

<?php
$sql="select fecha, hora, nombre_dentista, asunto
from citas 
inner join dentistas on dentistas.idDentistas=citas.idDentistas
where idPacientes=".$_SESSION['idPacientes']." and status='activa'";

$result=mysql_query($sql);
while($array=mysql_fetch_array($result)){
    $arreglo[]=$array;
}
foreach ($arreglo as $row){
    echo("Fecha: ".$row['fecha']."<br>");
    echo("Hora: ".$row['hora']."<br>");
    echo("Dentista: ".$row['nombre_dentista']."<br>");
    echo("Asunto: ".$row['asunto']."<br>");
}
?>

<a href="PrincipalPaciente.php?action=agendaCita">Agenda una cita </a>
