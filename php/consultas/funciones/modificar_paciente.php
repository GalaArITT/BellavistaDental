<?php 
include('../../conexion.php');
$nombre=$_POST['nombre'];
$apellido=$_POST['apelido'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$sexo=$_POST['sexo'];
$id=$_POST['id'];

$sql="update pacientes set Pac_nombre='$nombre',Pac_apellido='$apellido',Pac_correo='$correo',Pac_telefono='$telefono',Pac_sexo='$sexo'
      where idPacientes=$id";
      
 if(mysql_query($sql))
 {
     echo("Paciente modificado correctamente-PrincipalAdministrador.php?action=verPacientes");
 }





 ?>