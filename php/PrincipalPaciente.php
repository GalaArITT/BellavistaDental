<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php
include('controladores/controlador_login.php');
if(!verificar_usuario())
{
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido Paciente</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/menuVerticalPaciente.css">
    <link rel="stylesheet" href="../CSS/styleIcons.css">
    <link type="text/css" rel="stylesheet" href="../CSS/imagen.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="consultas/funciones/manejador.js"></script>
</head>
<body>
<?php 
include ('Mensaje.php');
include('confirmar.php');
include('paciente/receta/detalleReceta.php');
 ?>
<h1>Bienvenido Paciente <span><img src="../IMG/logo.jpg" class="imagen"></h1>
<nav>
    <ul>
        <li> <a href="PrincipalPaciente.php"><span><i class="icon icon-home"></i></span> Inicio </a></li>
        <li> <a href="PrincipalPaciente.php?action=verCitas"><span><i class="icon icon-address-book"></i></span>Citas</a> </li>
        <li> <a href="PrincipalPaciente.php?action=verRecetas"><span><i class="icon icon-file-text2"></i></span>Recetas</a></li>
                <li> <a href="PrincipalPaciente.php?action=verCuenta"><span><i class="icon icon-file-text2"></i></span>Mi cuenta</a></li>
        <li> <a href="controladores/salir.php"><span><i class="icon icon-cancel-circle"></i></span>Cerrar Sesión</a></li>
    </ul>
</nav>

<div id="areaFuncion">
        <?php
       
       include ('Mensaje.php');
       
       switch ($_GET['action']) {
           case 'verCitas':
               include('paciente/cita/registros_cita.php');
               break;

           case 'paso1':
               include('paciente/cita/horario.php');
               break;

               case 'verRecetas':
               include('paciente/receta/registros_receta.php');
               break;

               case 'verCuenta':
               include('paciente/cuenta/miCuenta.php');
               break;
           default:
                   include ('paciente/portada.php');
                   break;
       }
       ?>
</div>


</body>
</html>