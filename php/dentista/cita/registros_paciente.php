<h2>Agenda una cita</h2>
<h3>Paso 1: Selecciona al paciente al que asignaras una cita</h3>
<?php 
include('conexion.php');
if($_GET['Status']=="activo"||$_GET['Status']=="")
//||$_GET['Status']==""
{
    $sql="select Status,idPacientes,Pac_nombre,Pac_apellido,Pac_correo,Pac_telefono,Pac_FecNac,Pac_sexo, pacientes.idUsuarios from pacientes
 inner join usuarios 
 on usuarios.idUsuarios=pacientes.idUsuarios
 where Status like 'activo' ";

}//Para los que están activos

if($_GET['Status']=="inactivo")
{
    $sql="select Status,idPacientes,Pac_nombre,Pac_apellido,Pac_correo,Pac_telefono,Pac_FecNac,Pac_sexo, pacientes.idUsuarios from pacientes
 inner join usuarios 
 on usuarios.idUsuarios=pacientes.idUsuarios
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
     <input type='text' id='busqueda'  placeholder='Busca un paciente'>
     </div>
     ");
echo("<div id='registros'>");
echo("<table id='tabla'>
	   <thead>
 <tr>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Correo</th>
	<th>Telefono</th>
	<th>Fecha de nacimiento</th>
	<th>Sexo</th>
	<th>Acciones</th>
 
	   </thead>
</tr>");

foreach ($arreglo as $row) 
{
    echo "<tr>
      <td>" . utf8_encode($row['Pac_nombre']) . "</td>
      <td>" . utf8_encode($row['Pac_apellido']) . "</td>
      <td>" . $row['Pac_correo'] . "</td>
      <td>" . $row['Pac_telefono'] . "</td>
      <td>" . $row['Pac_FecNac'] . "</td>
      <td>" . $row['Pac_sexo'] . "</td>";
         
  

     echo("<td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>");
     echo("<a href='PrincipalDentista.php?action=paso2&&idPac=".$row['idPacientes']."&&paciente=". utf8_encode($row['Pac_nombre']) ." ". utf8_encode($row['Pac_apellido']) ." '>Seleccionar</a>
              </div>
              </div>
              </td></tr>");

    

}
echo("</table>");
echo("</div>");
?>




