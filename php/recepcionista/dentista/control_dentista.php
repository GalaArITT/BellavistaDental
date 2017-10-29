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
$ingresaDentista=false;
//TABLA PACIENTES
$txtnombreden=mb_strtoupper($_POST['txtnombreden'],'UTF-8');
$txtapellidoden=mb_strtoupper($_POST['txtapellidoden'],'UTF-8');
$txtfecnacden=$_POST['txtfecnacden'];
$txttelefonoden=$_POST['txttelefonoden'];

if (!preg_match('/^[\p{Latin}\s]+$/u',$txtnombreden))
{
  echo("El campo de nombre solo acepta letras y espacios<br>");  
  $validar=false;
}

if (!preg_match('/^[\p{Latin}\s]+$/u',$txtapellidoden))
{
  echo("El campo de apellido solo acepta letras y espacios<br>");  
  $validar=false;
}

$txtapellidoden=utf8_decode($txtapellidoden);
$txtnombreden=utf8_decode($txtnombreden);
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
$ingresaDentista=false;
}
$ingresaDentista=true;

     $clave = '';
     $pattern = '1234567890';
     $max = strlen($pattern)-1;
     for($i=0;$i < 4;$i++) $clave .= $pattern{mt_rand(0,$max)};

  if($ingresaDentista==true)
  {
  if($validar==true)
    {
    $sql="insert into Usuarios(Contrasena, Nombre_Usuario, FechaRegistro, TipoUsuario,Status )
	values ('$clave','$nombre_usuario', now(),2,'activo')";
    mysql_query($sql);


    $sql2= "select idUsuarios from Usuarios order by FechaRegistro desc limit 1";
    $resultado=mysql_query($sql2);
    while ($arreglo=mysql_fetch_array($resultado)) {
        $idUsuario=$arreglo['idUsuarios'];
    }
    $sql3="insert into Dentistas (Nombre_Dentista,Apellido_Dentista, FechaNac, Telefono,idUsuarios)
		values ('$txtnombreden','$txtapellidoden','$txtfecnacden','$txttelefonoden',$idUsuario)";
//echo $sql3;
     if(mysql_query($sql3))
     {
     echo("Dentista registrado correctamente<br>Usuario: $nombre_usuario<br>Contrasena: $clave-PrincipalRecepcionista.php?action=verDentistas");
     }
   
}
}
}
if ($_POST['Enviar']=='Modificar'){
    $validar=true;

//TABLA PACIENTES
    $txtnombreden=mb_strtoupper($_POST['txtnombreden'],'UTF-8');
    $txtapellidoden=mb_strtoupper($_POST['txtapellidoden'],'UTF-8');
    $txtfecnacden=$_POST['txtfecnacden'];
    $txttelefonoden=$_POST['txttelefonoden'];

    if (!preg_match('/^[\p{Latin}\s]+$/u',$txtnombreden))
    {
        echo("El campo de nombre solo acepta letras y espacios<br>");
        $validar=false;
    }

    if (!preg_match('/^[\p{Latin}\s]+$/u',$txtapellidoden))
    {
        echo("El campo de apellido solo acepta letras y espacios<br>");
        $validar=false;
    }

    $txtapellidoden=utf8_decode($txtapellidoden);
    $txtnombreden=utf8_decode($txtnombreden);
    $idDen=$_POST['idDen'];

    if($validar==true){
        $sql="update dentistas set Nombre_Dentista='$txtnombreden', Apellido_Dentista='$txtapellidoden', 
FechaNac='$txtfecnacden', Telefono='$txttelefonoden'
where idDentistas = $idDen";

        if(mysql_query($sql)){
            echo("Dentista modificado correctamente-PrincipalRecepcionista.php?action=verDentistas");
        }
    }
}
?>