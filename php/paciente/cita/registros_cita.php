<h2>Tus citas</h2>
<?php 
include('conexion.php');
$id_paciente=$_SESSION['idPacientes'];
if($_GET['Status']=="atendidas")
//||$_GET['Status']==""
{
    $sql="select concat(dentistas.Nombre_Dentista,' ',dentistas.Apellido_Dentista) as 'Dentista', concat(pacientes.Pac_nombre,' ',pacientes.Pac_Apellido) as 'Paciente',
          asunto,fecha,hora,status,idCitas from citas 
          inner join dentistas on dentistas.idDentistas=citas.idDentistas
          inner join pacientes on pacientes.idPacientes=citas.idPacientes where citas.status='inactiva'
          and citas.idPacientes=$id_paciente";
}//Para los que están activos

if($_GET['Status']=="inatendidas"||$_GET['Status']=="")
{
    $sql="select concat(dentistas.Nombre_Dentista,' ',dentistas.Apellido_Dentista) as 'Dentista', concat(pacientes.Pac_nombre,' ',pacientes.Pac_Apellido) as 'Paciente',
          asunto,fecha,hora,status,idCitas from citas 
          inner join dentistas on dentistas.idDentistas=citas.idDentistas
          inner join pacientes on pacientes.idPacientes=citas.idPacientes where citas.status='activa'
          and citas.idPacientes=$id_paciente";

}//para los que están en inactivo



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
echo ("<select onchange='window.location=this.options[this.selectedIndex].value'>
  <option>Filtrar por</option>
  <option value='PrincipalPaciente.php?action=verCitas&&Status=inatendidas''>Citas sin atender</option>
  <option value='PrincipalPaciente.php?action=verCitas&&Status=atendidas''>Citas atendidas</option>
  
  </select>&nbsp;&nbsp;&nbsp;");
echo("<label>Busca por fecha:</label><input type='date'>");
echo("<div id='registros'>");
echo("<table id='tabla'>
	   <thead>
 <tr>
	<th>Dentista</th>
	<th>Paciente</th>
	<th>Asunto</th>
	<th>Hora</th>
	<th>Fecha</th>
	<th>Status</th>
  <th>Acciones</th>
 
 
	   </thead>
</tr>");
if($arreglo)
{
foreach ($arreglo as $row) 
{
    echo "<tr>
      <td>" . utf8_encode($row['Dentista']) . "</td>
      <td>" . utf8_encode($row['Paciente']) . "</td>
      <td>" . $row['asunto'] . "</td>
      <td>" . $row['hora'] . "</td>
      <td>" . $row['fecha'] . "</td>
      <td>" . $row['status'] . "</td>";
         
   echo("<td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>");
                if($row['status']=="activa")
        {
         
          echo("<a onclick='confirmar(" .$row['idUsuarios']. ",1)'>Cancelar</a>");
        }
        
        
        echo("<a href='PrincipalRecepcionista.php?action=modificaCita&&idCita=".$row['idCitas']."'>Modificar</a>
              
              </div>
              </div>
              </td></tr>");

     

    

}
}

else
{
echo("<h2>Aun no tienes citas</h2>");
}

echo("</table>");
echo("</div>");
?>
<a id='btnNuevo' href="PrincipalPaciente.php?action=paso1&&id=<?php echo($id_paciente); ?>">Nueva cita</a>



