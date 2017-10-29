<?php 
include('conexion.php');
if($_GET['Status']=="activo"||$_GET['Status']=="")
//||$_GET['Status']==""
{
    $sql="select Status,idDentistas,Nombre_Dentista,Apellido_Dentista,FechaNac,Telefono, dentistas.idUsuarios 
 from dentistas
 inner join usuarios 
 on usuarios.idUsuarios=dentistas.idUsuarios
 where Status like 'activo' ";

}//Para los que están activos

if($_GET['Status']=="inactivo")
{
    $sql="select Status,idDentistas,Nombre_Dentista,Apellido_Dentista,FechaNac,Telefono, dentistas.idUsuarios 
 from dentistas
 inner join usuarios 
 on usuarios.idUsuarios=dentistas.idUsuarios
 where Status like 'inactivo' ";

}//para los que están en inactivo

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
echo ("<select onchange='window.location=this.options[this.selectedIndex].value'>
  <option>Filtrar por</option>
  <option value='PrincipalRecepcionista.php?action=verDentistas&&Status=activo''>Activos</option>
  <option value='PrincipalRecepcionista.php?action=verDentistas&&Status=inactivo''>Inactivos</option>
  </select>");
echo("<table id='tabla'>
	   <thead>
 <tr>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Fecha de nacimiento</th>
	<th>Telefono</th>
	 <th>Acciones</th>
	   </thead>
</tr>");

foreach ($arreglo as $row) 
{
    echo "<tr>
      <td>" . utf8_encode($row['Nombre_Dentista']) . "</td>
      <td>" . utf8_encode($row['Apellido_Dentista']) . "</td>
      <td>" . $row['FechaNac'] . "</td>
      <td>" . $row['Telefono'] . "</td>";
         
  

     echo("<td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>");
                if($row['Status']=="activo")
        {
          $Status="activo";
          echo("<a onclick='confirmar(" .$row['idUsuarios']. ",1)'>Inactivar</a>");
        }
        else 
        {
          $Status="inactivo";
          echo("<a onclick='confirmar(" .$row['idUsuarios']. ",2)'>Activar</a>");
        }
        
        echo("<a href='PrincipalRecepcionista.php?action=modificaDentista&&idDen=".$row['idDentistas']."'>Modificar</a>

              
              </div>
              </div>
              </td></tr>");

    

}
echo("</table>");
?>
<a href="PrincipalRecepcionista.php?action=nuevoDentista">Nuevo Dentista</a>



