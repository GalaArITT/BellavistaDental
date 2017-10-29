<?php
include('../../conexion.php');
$idCitas=$_POST['idCitas'];

$sql_inserta="delete from citas where idCitas=$idCitas";
if(mysql_query($sql_inserta))
{
    echo("Cita eliminada exitosamente-PrincipalPaciente.php?action=verCitas");
}


?>
