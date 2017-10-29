<?php 
include_once("../../conexion.php");
$diente=$_POST['diente'];
$idPaciente=$_POST['idPaciente'];
$id_dentista=$_POST['id_dentista'];
 $query="select idOdontograma,MuelaDiente,Terapia,idPacientes,idDentistas,mueladiente.nombre from odontograma
         inner join mueladiente on mueladiente.id_muelaDiente=odontograma.MuelaDiente
         where idPacientes=$idPaciente and idDentistas=$id_dentista and mueladiente.nombre='$diente'";
         

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


echo("<form action='dentista/odontograma/controlOdonto.php' method='post'>
	<h3>Diente</h3>
	   &nbsp;&nbsp;<input type='text' name='diente' value='$diente'readonly>
	   <h3>Anotaciones</h3>
	   <textarea name='anota'>$anota</textarea>
	   <input type='hidden' value='$idPaciente' name='idPac'>
	    <input type='hidden' value='$id_dentista' name='idDen'>
	   <input type='submit' value='Guardar'>
	   <input type='reset' value='Limpiar'>
	   </form>
	   ");





 ?>