<?php 
include('../../conexion.php');

if($_POST['Enviar']=='Registrar')
{
//TABLA PACIENTES
$nombre=mb_strtoupper($_POST['nombre'],'UTF-8');
$cantidad=$_POST['cantidad'];

$nombre=utf8_decode($nombre);
//como hacer una variable autoincrementable sin necesidad

$sql="insert into inventario(nombre,cantidad) values('$nombre',$cantidad)";
    if(mysql_query($sql))
    {
      echo("Utensilio insertado correctamente-PrincipalDentista.php?action=verInventario");
    }
}

if($_POST['Enviar']=='Modificar')
{
//TABLA PACIENTES
$nombre=mb_strtoupper($_POST['nombre'],'UTF-8');
$cantidad=$_POST['cantidad'];
$id=$_POST['id_utensilio']; 
 
$nombre=utf8_decode($nombre);
//como hacer una variable autoincrementable sin necesidad

$sql="update inventario set nombre='$nombre', cantidad=$cantidad where id_utensilio=$id ";

 if(mysql_query($sql))
    {
      echo("Utensilio modificado correctamente-PrincipalDentista.php?action=verInventario");
    }
}
?>