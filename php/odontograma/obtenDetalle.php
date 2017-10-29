<?php 
include_once("../conexion.php");
$diente=$_POST['diente'];
$idPaciente=$_POST['idPaciente'];

 $query="select * from odontograma where idPacientes=$idPaciente and idDentistas=1 and muelaDiente='$diente'";
 $result=mysql_query($query);
while($array=mysql_fetch_array($result))
{
 $arreglo[]=$array;
}
$anota="";
if(!empty($arreglo))
{
foreach ($arreglo as $row) 
{
	$anota=$row['Terapia'];
}	
}


echo("<form action='odontograma/modifica_diente.php' method='post'>
	<h3>Diente</h3>
	   &nbsp;&nbsp;<input type='text' name='diente' value='$diente'readonly>
	   <h3>Anotaciones</h3>
	   <textarea name='anota'>$anota</textarea>
	   <input type='hidden' value='$idPaciente' name='idPac'>
	   <input type='submit' value='Guardar'>
	   <input type='reset' value='Limpiar'>
	   </form>
	   ");





 ?>