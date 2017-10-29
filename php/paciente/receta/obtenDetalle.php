<?php 
include('../../conexion.php');
$id_receta=$_POST['id_receta'];
$sql="select concat(Nombre_Dentista,' ',Apellido_Dentista) as 'dentista',date(fecha) as 'fecha',indicacion
 from recetas 
 inner join dentistas on dentistas.idDentistas=recetas.idDentistas
where idRecetas=$id_receta";

$result=mysql_query($sql);
while($array=mysql_fetch_array($result))
{
$arregloReceta[]=$array;
}

foreach ($arregloReceta as $row) 
{
$fecha=$row['fecha'];
$dentista=$row['dentista'];
$indicacion=$row['indicacion'];
echo(
"<h3>Fecha</h3>
<p>$fecha</p>
<h3>Dentista que te receta</h3> 
<p>$dentista</p>
<h3>Indicacion</h3>
<p>$indicacion</p> ");
}
?>


