<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php
function inicio($usuario,$clave)
{
include('controlador_login.php');

if(conexiones($usuario,$clave)=="1")
{
echo("Registrado correctamente-PrincipalPaciente.php");
}

if(conexiones($usuario,$clave)=="2") 
{
echo("Registrado correctamente-PrincipalDentista.php");
}

if(conexiones($usuario,$clave)=="3") 
{
echo("Registrado correctamente-PrincipalRecepcionista.php");
}

if(conexiones($usuario,$clave)=="4")
{
echo("Registrado correctamente-PrincipalAdministrador.php");
}

if(conexiones($usuario,$clave)=="")
{
 header("location:../../index.php?login=fallo");
}
}
?>