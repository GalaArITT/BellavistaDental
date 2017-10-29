<h2>Inventario</h2>
<?php 
include('conexion.php');
$sql="select * from inventario";
$result =mysql_query($sql);
while($array=mysql_fetch_assoc($result))
{
$arreglo[]=$array;
}


echo("<div id='campoBusqueda'>
      <br>
      <h5>Busqueda...</h5>
     <input type='text' id='busqueda'  placeholder='Buscar...'>
     </div>
     ");

echo("<div id='registros'>");
echo("<table id='tabla'>
	   <thead>
 <tr>
	<th>Nombre</th>
	<th>Cantidad</th>
 <th>Acciones</th>
 
	   </thead>
</tr>");

foreach ($arreglo as $row) 
{
    echo "<tr>
      <td>" . utf8_encode($row['nombre']) . "</td>
      <td>" . $row['cantidad'] . "</td>";
         
  

     echo("<td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>");
                echo("<a href='PrincipalDentista.php?action=modificaInventario&&id=".$row['id_utensilio']." '>Modificar</a>
              </div>
              </div>
              </td></tr>");

    

}
echo("</table>");
echo("</div>");
?>
<a id='btnNuevo' href="PrincipalDentista.php?action=nuevoInventario">Nuevo utensilio</a>



