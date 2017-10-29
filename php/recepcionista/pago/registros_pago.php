<h2>Inventario</h2>
<?php 
include('conexion.php');
if($_GET['Status']=="deuda"||$_GET['Status']=="")
//||$_GET['Status']==""
{
$sql="select id_pago,concat(Nombre_Dentista,' ',Apellido_Dentista) as 'dentista',
concat(Pac_Nombre,' ',Pac_Apellido) as'paciente',concepto,importe,pago,
fecha from pagos
inner join dentistas on dentistas.idDentistas=pagos.id_dentista
inner join pacientes on pacientes.idPacientes=pagos.id_paciente
where Importe>pago";


}//Para los que están activos

if($_GET['Status']=="pagado")
{
$sql="select id_pago,concat(Nombre_Dentista,' ',Apellido_Dentista) as 'dentista',
concat(Pac_Nombre,' ',Pac_Apellido) as'paciente',concepto,importe,pago,
fecha from pagos
inner join dentistas on dentistas.idDentistas=pagos.id_dentista
inner join pacientes on pacientes.idPacientes=pagos.id_paciente
where pago=importe";
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
  <option value='PrincipalRecepcionista.php?action=verPagos&&Status=deuda''>Sin liquidar</option>
  <option value='PrincipalRecepcionista.php?action=verPagos&&Status=pagado''>Liquidado</option>
  </select>");
echo("<div id='registros'>");
echo("<table id='tabla'>
	   <thead>
 <tr>
	<th>Dentista</th>
	<th>Paciente</th>
 <th>Concepto</th>
  <th>Importe</th>
   <th>A cuenta</th>
   <th>Fecha</th>
   <th>Acciones</th>
	   </thead>
</tr>");

foreach ($arreglo as $row) 
{
    echo "<tr>
      <td>" . utf8_encode($row['dentista']) . "</td>
       <td>" . utf8_encode($row['paciente']) . "</td>
        <td>" . $row['concepto'] . "</td>
      <td>" . $row['importe'] . "</td>
      <td>" . $row['pago'] . "</td>
      <td>" . $row['fecha'] . "</td>";
         
  

     echo("<td id='tdOpcion'><div class='dropdown2'>
                <button class='dropbtn2'>Acciones</button>
                <div class='dropdown-content2'>");
                if($_GET['Status']=="deuda"||$_GET['Status']=="")
                {
                echo("<a onClick=liquidar(".$row['id_pago'].")>Liquidar</a>");
                }
                 echo("<a href=recepcionista/pago/pdfPago.php?id_pago=".$row['id_pago']." target='_blank'>Imprimir</a>");
            echo("</div>
              </div>
              </td></tr>");

    

}
echo("</table>");
echo("</div>");
?>




