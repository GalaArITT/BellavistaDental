<?php 
$usuario="root";
$clave="";
$servidor="localhost";
$base="proyectodental";
//GUARDARMOS EN UNA VARIABLE LLAMADA CONEXION LA INSTRUCCION PARA CONECTAR A LA BASE DE DATOS
$conexion=@mysql_connect($servidor,$usuario,$clave);
//SI LA INSTRUCCION ALMACENADA EN LA VARIABLE CONEXION SE EJECUTO CORRECTAMENTE
if($conexion)
  {
   mysql_select_db($base);
  }
  else
  	{echo("error");}
 ?>