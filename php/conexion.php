<?php 
$servidor= "localhost";
$usuario="root";
$contrasena="";
$base="proyectodental";

/*if(mysql_connect($servidor,$usuario,$contrasena))
{
	echo "conectado";
	
	if(mysql_select_db($base)){echo " BD seleccionada ";}
} */
// PRIMERO ES RECOMENDABLE REALIZAR PRUEBAS CON UN IF
	mysql_connect($servidor,$usuario,$contrasena);
	mysql_select_db($base);

 ?>
