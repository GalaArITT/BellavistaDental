<?php 
include('../../conexion.php');
if($_POST['accion']=='obtenHorario')
{
$idUsuario=$_POST['idUsuario'];
$id_dentista=$_POST['id_dentista'];
$fecha=$_POST['fecha'];
$sql="select * from dentistas where idDentistas=$id_dentista";
$result=mysql_query($sql);
while($array=mysql_fetch_array($result))
{
$arregloDent[]=$array;
}

foreach ($arregloDent as $row) 
{
$turno=$row['horario'];
$dentista=$row['Nombre_Dentista']." ".$row['Apellido_Dentista'];
}

       if($turno=='Matutino')
        {
        echo("<form  type'post' id='formularioAsunto'>");
        echo(' <h3>Paso 4: Selecciona una hora</h3>
        
        
        <table id="horarioD">
        <tr><th>Dentista: '.$dentista.' </th></tr>
        <tr><td id="horario1" onclick="agendaCitaPaciente(1,'.$id_dentista.','.$idUsuario.')">10:00-10:30</td></tr>
        <tr><td id="horario2" onclick="agendaCitaPaciente(2,'.$id_dentista.','.$idUsuario.')">10:30-11:00</td></tr>
        <tr><td id="horario3" onclick="agendaCitaPaciente(3,'.$id_dentista.','.$idUsuario.')">11:00-11:30</td></tr>
        <tr><td id="horario4" onclick="agendaCitaPaciente(4,'.$id_dentista.','.$idUsuario.')">11:30-12:00</td></tr>
        <tr><td id="horario5" onclick="agendaCitaPaciente(5,'.$id_dentista.','.$idUsuario.')">12:00-12:30</td></tr>
        <tr><td id="horario6" onclick="agendaCitaPaciente(6,'.$id_dentista.','.$idUsuario.')">12:30-13:00</td></tr>
        </table>');
       echo("</form>");
        }

        if($turno=='Vespertino')
        {
        echo("<form  type'post' id='formularioAsunto'>");
        echo(' <h3>Paso 4: Selecciona una hora</h3>
       
        
         <table id="horarioL">
        <tr><th>Dentista: '.$dentista.' </th></tr>
        <tr><td id="horario7" onclick="agendaCitaPaciente(7,'.$id_dentista.','.$idUsuario.')">15:00-15:30</td></tr>
        <tr><td id="horario8" onclick="agendaCitaPaciente(8,'.$id_dentista.','.$idUsuario.')">15:30-16:00</td></tr>
        <tr><td id="horario9" onclick="agendaCitaPaciente(9,'.$id_dentista.','.$idUsuario.')">16:00-16:30</td></tr>
        <tr><td id="horario10" onclick="agendaCitaPaciente(10,'.$id_dentista.','.$idUsuario.')">16:30-17:00</td></tr>
        <tr><td id="horario11" onclick="agendaCitaPaciente(11,'.$id_dentista.','.$idUsuario.')">17:00-17:30</td></tr>
        <tr><td id="horario12" onclick="agendaCitaPaciente(12,'.$id_dentista.','.$idUsuario.')">17:30-18:00</td></tr>
        <tr><td id="horario13" onclick="agendaCitaPaciente(13,'.$id_dentista.','.$idUsuario.')">18:00-18:30</td></tr>
        <tr><td id="horario14" onclick="agendaCitaPaciente(14,'.$id_dentista.','.$idUsuario.')">18:30-19:00</td></tr>
        </table>');
 echo("</form>");
        }
}

if($_POST['accion']=='horasDisponibles')
{
    $horas="";
	$id_dentista=$_POST['id_dentista'];
    $fecha=$_POST['fecha'];
    $sql= "select hora from citas where fecha='$fecha'";
   
        $result=mysql_query($sql);
        while($array=mysql_fetch_array($result))
        {
            $arregloHora[]=$array;
        }
        if($arregloHora)
        {
         foreach ($arregloHora as $row) 
         {
           $horas=$horas.$row['hora']."-";
         }
         echo($horas);
        }
}
 ?>
