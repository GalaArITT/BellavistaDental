<h2>Registros de odontogramas</h2>
<?php 

include('conexion.php');

$sql="select distinct concat(Pac_Nombre,' ',Pac_Apellido)as 'Paciente',odontograma.idPacientes,Pac_Nombre,Pac_Apellido
 from odontograma 
inner join pacientes on odontograma.idPacientes=pacientes.idPacientes 
where odontograma.idDentistas=".$_SESSION['id']."";


$result =mysql_query($sql);
while($array=mysql_fetch_assoc($result))
{
$arreglo[]=$array;
}


echo("<div id='campoBusqueda'>
      <br>
      <h5>Busqueda...</h5>
     <input type='text' id='busqueda'  placeholder='Busca un paciente o un dentista'>
     </div>
     ");


echo("<div id='registros'>");
echo("<table id='tabla'>
	   <thead>
 <tr>
<th>Odontograma del paciente</th>
<th>Acciones</th>
	</thead>
</tr>");
if($arreglo)
{
foreach ($arreglo as $row) 
{
    echo "<tr>
     <td>" . utf8_encode($row['Paciente']) . "</td>";
         echo("<td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>");
              
        
        
        echo("<a href='PrincipalDentista.php?action=paso2Odo&&idPac=".$row['idPacientes']."&&paciente=". utf8_encode($row['Pac_Nombre']) ." ". utf8_encode($row['Pac_Apellido']) ." '>Ver odontograma</a>
              
              </div>
              </div>
              </td></tr>");

    

}
}
else
{
echo("<h2>No has generado ningun odontograma</h2>");
}

echo("</table>");
echo("</div>");
?>
<a id='btnNuevo' href="PrincipalDentista.php?action=paso1Odo">Nuevo odontograma</a>



