<?php 
include('../../conexion.php');
$claveActual=$_POST['claveActual'];
$claveNueva=$_POST['claveNueva'];
$user=$_POST['user'];

$sqlBusqueda="select * from usuarios where Nombre_Usuario='$user' and Contrasena='$claveActual'";
$resultBusueda=mysql_query($sqlBusqueda);
if(mysql_num_rows($resultBusueda)!=0)
{
$sql="update usuarios set Contrasena='$claveNueva' where Nombre_Usuario='$user'";
mysql_query($sql);
echo("Contrasena actualizada correctamente-PrincipalPaciente.php");
}
else
{
echo("La contrasena actual no coincide");
}
?>