<h2>Recetas expedidas</h2>
<?php 

include('conexion.php');

   $sql="select idRecetas,ruta,paciente,indicacion,date(fecha) as 'fecha' from recetas where idDentistas=".$_SESSION['id']." ";



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

	<th>Paciente</th>
	<th>Fecha</th>
  <th>Acciones</th>
 
	   </thead>
</tr>");
if($arreglo)
{
foreach ($arreglo as $row) 
{
    echo "<tr>
     
      <td>" . utf8_encode($row['paciente']) . "</td>
      <td>" . $row['fecha'] . "</td>";
         
  

     echo("<td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>");
      echo("<a href='dentista/receta/".$row['ruta']."' target='_blank'>Imprimir</a></td>
              
              </div>
              </div>
              </td></tr>");

    

}
}
else
{
echo("<h2>No cuentas aun con ninguna receta expedida</h2>");
}

echo("</table>");
echo("</div>");
?>
<a id='btnNuevo' href="PrincipalDentista.php?action=paso1Rec">Nueva receta</a>



