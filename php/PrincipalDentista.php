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
    <title>Bienvenido Dentista</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/menuVerticalDentista.css">
    <link rel="stylesheet" href="../CSS/styleIcons.css">
    <link type="text/css" rel="stylesheet" href="../CSS/imagen.css">
    <link rel="icon" href="../IMG/blue.ico" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="consultas/funciones/manejador.js"></script>
    <script src="../JS/buscador.js" ></script>
</head>
<body>
<h1>Bienvenido Dentista <span><img src="../IMG/logo.jpg" class="imagen"></span></h1>
<nav>
    <ul>
        <li><a href="PrincipalDentista.php"><span><i class="icon icon-home"></i></span> Inicio </a></li>
        <li> <a href="PrincipalDentista.php?action=verAgendaDentista"><span><i class="icon icon-address-book"></i></span>Citas</a> </li>
        <li> <a href="PrincipalDentista.php?action=registros_odonto"><span><i class="icon icon-file-text2"></i></span>Odontograma</a></li>
        <li> <a href="PrincipalDentista.php?action=registros_receta"><span><i class="icon icon-file-text2"></i></span>Recetas</a></li>
        <li> <a href="PrincipalDentista.php?action=verInventario"><span><i class="icon icon-drawer2"></i></span>Inventario</a></li>
        <li> <a href="PrincipalDentista.php?action=cobro"><span><i class="icon icon-drawer2"></i></span>Cobro</a></li>
        <li> <a href="controladores/salir.php"><span><i class="icon-cancel-circle"></i></span>Cerrar Sesión</a></li>
    </ul>
    <img src="">
</nav>
<?php 
include('odontograma/detalle_diente.php');
 ?>
<div id="areaFuncion">
    <?php
   
    include ('Mensaje.php');
    switch ($_GET['action']) {

        case 'registros_paciente':
            echo("<h2>Pacientes Registrados</h2>");
            include('pacientesDentista/plantillas/tabla.php');
            break;

            case 'expide_receta':
            echo("<h2>Expide una receta</h2>");
            include('receta/llena_receta.php');
            break;

        
        case 'verRecetas':
            include('citas/verReceta');
            break;

            case 'registros_receta':
            include('dentista/receta/registros_receta.php');
            break;

             case 'paso1Rec':
            include('dentista/receta/registros_paciente.php');
            break;

            case 'paso2Rec':
            include('dentista/receta/llena_receta.php');
            break;

             case 'odontograma':
            include('odontograma/odo.php');
            break;

            case 'verAgendaDentista':
            include('dentista/cita/registros_cita.php');
            break;

            case 'paso1':
            include('dentista/cita/registros_paciente.php');
            break;

            case 'paso2':
            include('dentista/cita/horario.php');
            break;

            case 'paso3':
            include('dentista/cita/horario.php');
            break;

            case 'registros_odonto':
            include('dentista/odontograma/registros_odonto.php');
            break;

            case 'paso1Odo':
            include('dentista/odontograma/registros_paciente.php');
            break;

            case 'paso2Odo':
            include('dentista/odontograma/odo.php');
            break;

             case 'cobro':
            include('dentista/cobro/registros_paciente.php');
            break;

             case 'paso2Co':
            include('dentista/cobro/cobrar.php');
            break;

             case 'verInventario':
            include('dentista/inventario/registros_inventario.php');
            break;

            case 'nuevoInventario':
            include('dentista/inventario/nuevoInventario.php');
            break;

             case 'modificaInventario':
            include('dentista/inventario/modificaInventario.php');
            break;
        default:
             include('dentista/portada.php');
            break;
    }
    ?>
</div>

</body>
</html>