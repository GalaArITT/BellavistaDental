<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php
include('controlador_login.php');
$usuario=$_POST['txtusuario'];
$clave=$_POST['txtcontra'];

if(conexiones($usuario,$clave)=="1")
{
header("location:../PrincipalPaciente.php");
}

if(conexiones($usuario,$clave)=="2") 
{
header("location:../PrincipalDentista.php");
}

if(conexiones($usuario,$clave)=="3") 
{
header("location:../PrincipalRecepcionista.php");
}

if(conexiones($usuario,$clave)=="4")
{
header("location:../PrincipalAdministrador.php");
}

if(conexiones($usuario,$clave)=="")
{
 header("location:../../index.php?login=fallo");
}
?>