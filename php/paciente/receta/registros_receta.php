<h2>Recetas que te han expedido</h2>
<?php 
$id_paciente=$_SESSION['idPacientes'];
include('conexion.php');

   $sql="select idRecetas,ruta,paciente,indicacion,date(fecha) as 'fecha',concat(Nombre_Dentista,' ',Apellido_Dentista) 
   as 'dentista' 
   from recetas  
   inner join dentistas on dentistas.idDentistas=recetas.idDentistas
   where idPacientes=$id_paciente";




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
  
  <th>Dentista</th>

	<th>Fecha</th>
  <th>Acciones</th>
 
	   </thead>
</tr>");
if($arreglo)
{
foreach ($arreglo as $row) 
{
    echo "<tr>
     <td>" . utf8_encode($row['dentista']) . "</td>
      
      <td>" . $row['fecha'] . "</td>";
         
  

     echo("<td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>");
      echo("<a onClick=verIndicacion(".$row['idRecetas'].")>Ver indicaciones</a></td>
              
              </div>
              </div>
              </td></tr>");

    

}
}
else
{
echo("<h2>No te han expedido ninguna receta aun</h2>");
}

echo("</table>");
echo("</div>");
?>




