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
echo ("<select onchange='window.location=this.options[this.selectedIndex].value'>
  <option>Filtrar por</option>
  <option value='PrincipalRecepcionista.php?action=verPacientes&&Status=activo''>Activos</option>
  <option value='PrincipalRecepcionista.php?action=verPacientes&&Status=inactivo''>Inactivos</option>
  </select>");

echo("<table>
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

foreach ($arreglo as $row) {
    echo "<tr>
      <td>" . $row['Pac_nombre'] . "</td>
      <td>" . $row['Pac_apellido'] . "</td>
      <td>" . $row['Pac_correo'] . "</td>
      <td>" . $row['Pac_telefono'] . "</td>
       <td>" . $row['Pac_FecNac'] . "</td>
        <td>" . $row['Pac_sexo'] . "</td>";

         echo("
        <td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>
               <a href='PrincipalRecepcionista.php?action=agenda_cita&id=" . $row['idPacientes'] . "&nombre=" . $row['Pac_nombre'] . "&apellido=" . $row['Pac_apellido'] . "&correo=" . $row['Pac_correo'] . "&telefono=" . $row['Pac_telefono'] . "&sexo=" . $row['Pac_sexo'] . "'>Agendar</a>
                </div>
                </div>
                </td></tr>");
     

}
echo("</table>");
?>



