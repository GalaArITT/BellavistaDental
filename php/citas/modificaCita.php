<?php
error_reporting(E_ERROR | E_PARSE);
include('conexion.php')
?>
<h2>Modifica una cita</h2>
<div id='col1'>

    <h3>Paso 1: Selecciona una fecha</h3>
    <?php
    $idCitas=$_GET['idCita'];
    $idCita=$_GET['idCitas'];
    date_default_timezone_set('America/Mazatlan');
    //asignamos a una variable la fecha actual
    $fecha_sistema=date('Y-m-d');
    //para agendar cita se debera tener como fecha minima 3 dias despues del dia actual
    //y  no despues de 1 mes del dia actual
    //establecemos la fecha minima con 4 dias a partir del dia actual
    $fecha_min=date('Y-m-d', strtotime('+2 days', strtotime($fecha_sistema)));
    //establecemos la fecha maxima con 1 mes a partir del dia actual
    $fecha_max = date('Y-m-d', strtotime('+1 month', strtotime($fecha_sistema)));
    ?>
    <form id='formFechaMod' type="post">
        <input id='fecha_cita' value="<?php echo($_GET['fecha']) ?>" type="date" name='fecha' min="<?php echo  $fecha_min; ?>" max="<?php echo $fecha_max;   ?>";  required>
        <input  id='asunto' type="text" name='asunto' value="<?php echo($_GET['asunto']) ?>" placeholder="Asunto" required>
        <input type='hidden' id='idUsuario' name='idUsuario' value="<?php echo($_SESSION['idPaciente']) ?>">
        <input type='hidden' id='idCitas' name='idCitas' value="<?php echo($idCita)?>">
        <input type="submit">
    </form>

</div>
<script type="text/javascript">
    function horario1()
    {
        var elemento = document.getElementById("horario1");
        elemento.className ="reservado";
    }

    function horario2()
    {
        var elemento = document.getElementById("horario2");
        elemento.className ="reservado";
    }

    function horario3()
    {
        var elemento = document.getElementById("horario3");
        elemento.className ="reservado";
    }

    function horario4()
    {
        var elemento = document.getElementById("horario4");
        elemento.className ="reservado";
    }

    function horario5()
    {
        var elemento = document.getElementById("horario5");
        elemento.className ="reservado";
    }

    function horario6()
    {
        var elemento = document.getElementById("horario6");
        elemento.className ="reservado";
    }

    function horario7()
    {
        var elemento = document.getElementById("horario7");
        elemento.className ="reservado";
    }

    function horario8()
    {
        var elemento = document.getElementById("horario8");
        elemento.className ="reservado";
    }

    function horario9()
    {
        var elemento = document.getElementById("horario9");
        elemento.className ="reservado";
    }

    function horario10()
    {
        var elemento = document.getElementById("horario10");
        elemento.className ="reservado";
    }

    function horario11()
    {
        var elemento = document.getElementById("horario11");
        elemento.className ="reservado";
    }

    function horario12()
    {
        var elemento = document.getElementById("horario12");
        elemento.className ="reservado";
    }
    function horario13()
    {
        var elemento = document.getElementById("horario13");
        elemento.className ="reservado";
    }
    function horario14()
    {
        var elemento = document.getElementById("horario14");
        elemento.className ="reservado";
    }
</script>
<div id='col2'>
    <?php
    $sql="select hora from citas where fecha='".$_GET['fecha']."'";
    $result=mysql_query($sql);
    while($array=mysql_fetch_array($result))
    {
        $arreglo[]=$array;
    }
    ?>
    <h3>Paso 3: Selecciona una hora</h3>
    <div id="notacion">
        <article id="notaAzul"><h3>Disponible</h3></article>
        <div id="bloqueAzul"></div>
    </div>
    <div id="notacion">
        <article id="notaGris"><h3>No disponible</h3></article>
        <div id="bloqueGris"></div>
        <table id='horarioD'>
            <tr><th>Dentista: Dalia Lopez</th></tr>
            <tr><td id='horario1' onclick="modificaCita(1,2)">10:00-10:30</td></tr>
            <tr><td id='horario2' onclick="modificaCita(2,2)">10:30-11:00</td></tr>
            <tr><td id='horario3' onclick="modificaCita(3,2)">11:00-11:30</td></tr>
            <tr><td id='horario4' onclick="modificaCita(4,2)">11:30-12:00</td></tr>
            <tr><td id='horario5' onclick="modificaCita(5,2)">12:00-12:30</td></tr>
            <tr><td id='horario6' onclick="modificaCita(6,2)">12:30-01:00</td></tr>
        </table>

        <table id='horarioL'>
            <tr><th>Dentista: Luis Galaviz</th></tr>
            <tr><td id='horario7' onclick="modificaCita(7,1)">15:00-15:30</td></tr>
            <tr><td id='horario8' onclick="modificaCita(8,1)">15:30-16:00</td></tr>
            <tr><td id='horario9' onclick="modificaCita(9,1)">16:00-16:30</td></tr>
            <tr><td id='horario10' onclick="modificaCita(10,1)">16:30-17:00</td></tr>
            <tr><td id='horario11' onclick="modificaCita(11,1)">17:00-17:30</td></tr>
            <tr><td id='horario12' onclick="modificaCita(12,1)">17:30-18:00</td></tr>
            <tr><td id='horario13' onclick="modificaCita(13,1)">18:00-18:30</td></tr>
            <tr><td id='horario14' onclick="modificaCita(14,1)">18:30-19:00</td></tr>
        </table>

        <?php
        foreach ($arreglo as $row)
        {
            switch ($row['hora'])
            {
                case '10:00':
                    echo("<script>horario1();</script>");
                    break;

                case '10:30':
                    echo("<script>horario2();</script>");
                    break;

                case '11:00':
                    echo("<script>horario3();</script>");
                    break;

                case '11:30':
                    echo("<script>horario4();</script>");
                    break;

                case '12:00':
                    echo("<script>horario5();</script>");
                    break;

                case '12:30':
                    echo("<script>horario6();</script>");
                    break;

                case '15:00':
                    echo("<script>horario7();</script>");
                    break;

                case '15:30':
                    echo("<script>horario8();</script>");
                    break;

                case '16:00':
                    echo("<script>horario9();</script>");
                    break;

                case '16:30':
                    echo("<script>horario10();</script>");
                    break;

                case '17:00':
                    echo("<script>horario11();</script>");
                    break;

                case '17:30':
                    echo("<script>horario12();</script>");
                    break;

                case '18:00':
                    echo("<script>horario13();</script>");
                    break;

                case '18:30':
                    echo("<script>horario14();</script>");
                    break;

                default:
                    # code...
                    break;
            }
        }
        ?>
    </div>
</div>