<?php
include('../../conexion.php');
$diente=$_POST['diente'];
$idPaciente=$_POST['idPac'];
$idDentista=$_POST['idDen'];
$anota=$_POST['anota'];
$idDiente="";

$query_busca="select id_muelaDiente from mueladiente where nombre='$diente'";

$result=mysql_query($query_busca);
while($array=mysql_fetch_array($result))
{
$arreglo[]=$array;
}
foreach ($arreglo as $row) 
{
$idDiente=$row['id_muelaDiente'];
}

 $query="delete from odontograma where idPacientes=$idPaciente and idDentistas=$idDentista and muelaDiente=$idDiente";
 mysql_query($query);

 $query="insert into odontograma (MuelaDiente,Terapia,idPacientes,idDentistas)values($idDiente,'$anota',$idPaciente,$idDentista)";
 mysql_query($query);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>