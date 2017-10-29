<?php 
include_once("../conexion.php");
$diente=$_POST['diente'];
$idPaciente=$_POST['idPac'];
$anota=$_POST['anota'];
 $query="delete from odontograma where idPacientes=$idPaciente and idDentistas=1 and muelaDiente='$diente'";
 mysql_query($query);

 $query="insert into odontograma (MuelaDiente,Terapia,idPacientes,idDentistas)values('$diente','$anota',$idPaciente,1)";
 mysql_query($query);

header('Location: ' . $_SERVER['HTTP_REFERER']);


 ?>