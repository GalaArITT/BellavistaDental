
<?php error_reporting(E_ERROR | E_PARSE); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido Recepcionista</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/menuVerticalRecepcionista.css">
    <link rel="stylesheet" href="../CSS/styleIcons.css">
    <link type="text/css" rel="stylesheet" href="../CSS/imagen.css">
    <link rel="icon" href="../IMG/blue.ico" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="consultas/funciones/manejador.js"></script>
</head>
<body>
<?php 
include ('Mensaje.php');
include('confirmar.php');
 ?>
<h1>Bienvenido Recepcionista <span><img src="../IMG/logo.jpg" class="imagen"></h1>
<nav>
    <ul>
        <li><a href="PrincipalRecepcionista.php"><span><i class="icon icon-home"></i></span> Inicio </a></li>
        <li> <a href="PrincipalRecepcionista.php?action=verCitas"><span><i class="icon icon-user"></i></span>Cita</a> </li>
        <li> <a href="#"><span></span>Registro</a>
            <ul>
                <li><a href="PrincipalRecepcionista.php?action=verPacientes"><span><i class="icon icon-user"></i></span>Paciente</a></li>
                <li><a href="PrincipalRecepcionista.php?action=verDentistas"><span><i class="icon icon-aid-kit"></i></span>Dentista</a></li>
            </ul>
        </li>

        <li> <a href="PrincipalRecepcionista.php?action=verRecetas"><span><i class="icon icon-address-book"></i></span>Recetas</a></li>
        <li> <a href="PrincipalRecepcionista.php?action=verInventario"><span><i class="icon icon-drawer2"></i></span>Inventario</a></li>
        <li> <a href="PrincipalRecepcionista.php?action=verPagos"><span><i class="icon icon-drawer2"></i></span>Control de pagos</a></li>
        <li> <a href="controladores/salir.php"><span><i class="icon icon-cancel-circle"></i></span>Cerrar Sesión</a></li>

    </ul>
</nav>

<div id="areaFuncion">
    <?php
    switch ($_GET['action'])
    {
        case 'verPacientes':
            echo("<h2>Pacientes Registrados</h2>");
            include('recepcionista/paciente/registros_paciente.php');
            break;

            case 'nuevoPaciente':
            include('recepcionista/paciente/nuevoPaciente.php');
            break;

            case 'modificaPaciente':
            include('recepcionista/paciente/modificaPaciente.php');
            break;

            case 'verCitas':
            include('recepcionista/cita/registros_cita.php');
            break;

            case 'paso1':
            include('recepcionista/cita/registros_paciente.php');
            break;

            case 'paso2':
            include('recepcionista/cita/horario.php');
            break;

            case 'paso3':
            include('recepcionista/cita/horario.php');
            break;

            case 'verInventario':
            include('recepcionista/inventario/registros_inventario.php');
            break;

            case 'nuevoInventario':
            include('recepcionista/inventario/nuevoInventario.php');
            break;

             case 'modificaInventario':
            include('recepcionista/inventario/modificaInventario.php');
            break;

            case 'verPagos':
            include('recepcionista/pago/registros_pago.php');
            break;

            case 'verRecetas':
            include('recepcionista/receta/registros_receta.php');
            break;

        case 'agenda_cita':
            echo("<h2>Agenda Cita</h2>");
            include('citas/agendaCita.php');
            break;

             case 'verDentistas':
            echo("<h2>Dentistas Registrados</h2>");
            include('recepcionista/dentista/registros_dentista.php');
            break;
        case 'nuevoDentista':
            include('recepcionista/dentista/nuevoDentista.php');
            break;
        case 'modificaDentista':
            include('recepcionista/dentista/modificaDentista.php');
            break;


        default:
            # code...
            break;
    }
    ?>

</div>

</body>
</html>