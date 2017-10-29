<?php 
include('../../conexion.php');

function generarCodigo($longitud) 
{
 $key = '';
 $pattern = '1234567890';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}

if($_POST['Enviar']=='Registrar')
{
$validar=true;
$ingresaPaciente=false;
//TABLA PACIENTES
$txtnombrepac=mb_strtoupper($_POST['txtnombrepac'],'UTF-8');
$txtapellido=mb_strtoupper($_POST['txtapellido'],'UTF-8');
$txtcorreo=strtolower($_POST['txtcorreo']);
$txttelefono=$_POST['txttelefono'];
$txtfecnac=$_POST['txtfecnac'];
$sexo=$_POST['sexo'];
 
if (!preg_match('/^[\p{Latin}\s]+$/u',$txtnombrepac))
{
  echo("El campo de nombre solo acepta letras y espacios<br>");  
  $validar=false;
}

if (!preg_match('/^[\p{Latin}\s]+$/u',$txtapellido))
{
  echo("El campo de apellido solo acepta letras y espacios<br>");  
  $validar=false;
}

$txtapellido=utf8_decode($txtapellido);
$txtnombrepac=utf8_decode($txtnombrepac);
//como hacer una variable autoincrementable sin necesidad

$codigo=generarCodigo(3);
$nombre_usuario="usuario".$codigo;
$query_comprobacion="select * from usuarios where Nombre_Usuario='$nombre_usuario'";

$result=mysql_query($query_comprobacion);
while(mysql_num_rows($result)!=0)
{
$codigo=generarCodigo(3); 
$nombre_usuario="usuario".$codigo;
$query_comprobacion="select * from usuarios where Nombre_Usuario='$nombre_usuario'";
$result=mysql_query($query_comprobacion);
$ingresaPaciente=false;
}
$ingresaPaciente=true;

     $clave = '';
     $pattern = '1234567890';
     $max = strlen($pattern)-1;
     for($i=0;$i < 4;$i++) $clave .= $pattern{mt_rand(0,$max)};

  if($ingresaPaciente==true)
  {
  if($validar==true)
    {
    $sql="insert into Usuarios(Contrasena, Nombre_Usuario, FechaRegistro, TipoUsuario,Status )
	values ('$clave','$nombre_usuario', now(),1,'activo')";
    mysql_query($sql);


    $sql2= "select idUsuarios from Usuarios order by FechaRegistro desc limit 1";
    $resultado=mysql_query($sql2);
    while ($arreglo=mysql_fetch_array($resultado)) {
        $idUsuario=$arreglo['idUsuarios'];
    }
    $sql3="insert into Pacientes (Pac_Nombre, Pac_Apellido, Pac_correo, Pac_telefono, Pac_FecNac, Pac_sexo,idUsuarios)
		values ('$txtnombrepac','$txtapellido','$txtcorreo','$txttelefono','$txtfecnac','$sexo',$idUsuario)";
//echo $sql3;
     if(mysql_query($sql3))
     {
     echo("Paciente registrado correctamente<br>Usuario: $nombre_usuario<br>Contrasena: $clave-PrincipalRecepcionista.php?action=verPacientes");
     }
   
}
}
}

if($_POST['Enviar']=='Modificar')
{
$validar=true;
//TABLA PACIENTES
$txtnombrepac=mb_strtoupper($_POST['txtnombrepac'],'UTF-8');
$txtapellido=mb_strtoupper($_POST['txtapellido'],'UTF-8');
$txtcorreo=strtolower($_POST['txtcorreo']);
$txttelefono=$_POST['txttelefono'];
$txtfecnac=$_POST['txtfecnac'];
$sexo=$_POST['sexo'];
 
if (!preg_match('/^[\p{Latin}\s]+$/u',$txtnombrepac))
{
  echo("El campo de nombre solo acepta letras y espacios<br>");  
  $validar=false;
}

if (!preg_match('/^[\p{Latin}\s]+$/u',$txtapellido))
{
  echo("El campo de apellido solo acepta letras y espacios<br>");  
  $validar=false;
}

$txtapellido=utf8_decode($txtapellido);
$txtnombrepac=utf8_decode($txtnombrepac);
$idPac=$_POST['idPac'];

if($validar==true)
{
$sql="update pacientes set Pac_Nombre='$txtnombrepac',Pac_Apellido='$txtapellido',Pac_correo='$txtcorreo',Pac_telefono='$txttelefono',Pac_FecNac='$txtfecnac',Pac_sexo='$sexo' where idPacientes=$idPac";
if(mysql_query($sql))
 {
  echo("Paciente modificado correctamente-PrincipalRecepcionista.php?action=verPacientes");
 }
}
}
?>