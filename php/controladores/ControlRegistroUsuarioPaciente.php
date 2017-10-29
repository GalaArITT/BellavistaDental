<?php
include('../conexion.php');
include('inicio_automatico.php');
$validar=true;
$txtuser=$_POST['txtuser']; /*nombre para iniciar sesión tabla usuarios*/
$txtcontrasena=$_POST['txtcontrasena'];
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

$sqlE="SELECT * FROM Usuarios WHERE Nombre_Usuario = '$txtuser';";

$num=mysql_num_rows(mysql_query($sqlE));

if($num==0)
{
    if($validar==true)
    {
    $sql="insert into Usuarios(Contrasena, Nombre_Usuario, FechaRegistro, TipoUsuario,Status )
	values ('$txtcontrasena','$txtuser', now(),1,'activo')";
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
     inicio($txtuser,$txtcontrasena);
    }
    else {echo " ERROR";}
}
}
else{
    echo "El usuario '$txtuser' ya existe en nuestra base de datos";
    }
?>
