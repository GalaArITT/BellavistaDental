<?php
include('../../conexion.php');
$idUsuario=$_POST['idUsuario'];
$dentista=$_POST['dentista'];
$asunto=$_POST['asunto'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$insertar=true;
switch ($hora){
    case '1':
        $hora="10:00";
        break;
    case '2':
        $hora="10:30";
        break;
    case '3':
        $hora="11:00";
        break;
    case '4':
        $hora="11:30";
        break;
    case '5':
        $hora="12:00";
        break;
    case '6':
        $hora="12:30";
        break;
    case '7':
        $hora="15:00";
        break;
    case '8':
        $hora="15:30";
        break;
    case '9':
        $hora="16:00";
        break;
    case '10':
        $hora="16:30";
        break;
    case '11':
        $hora="17:00";
        break;
    case '12':
        $hora="17:30";
        break;
    case '13':
        $hora="18:00";
        break;
    case '14':
        $hora="18:30";
        break;
}

$sql_paciente="select * from citas where idPacientes = $idUsuario and status = 'activa' ";
$result=mysql_query($sql_paciente);

if (mysql_num_rows($result)!=0){
    echo("El paciente ya tiene una cita agendada no se le puede agendar mas de una<br>");
    $insertar=false;
}
$sql_fecha_hora="select * from citas where fecha='$fecha' and hora='$hora'";
$result2=mysql_query($sql_fecha_hora);

if(mysql_num_rows($result2)!=0){
    echo("Este horario no se encuentra disponible en esta fecha<br>");
    $insertar=false;
}
if($insertar==true){
    $sql_inserta="insert into citas (idDentistas, idPacientes, asunto, fecha,hora,status)
                  values ($dentista,$idUsuario, '$asunto','$fecha','$hora','activa')";
    if (mysql_query($sql_inserta)){
        echo("Cita agendada correctamente-PrincipalRecepcionista.php?action=verCitas");
    }
}

?>