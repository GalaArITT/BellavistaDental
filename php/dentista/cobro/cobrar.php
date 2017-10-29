<?php
    error_reporting(E_ERROR | E_PARSE);
    include('conexion.php')
?>
<h2>Expide un recibo de pago al paciente <?php echo($_GET['paciente']); ?></h2>
<div id="col1">

   
    <?php 
    $sql_den="select * from dentistas";
    $result=mysql_query($sql_den);
    while($array=mysql_fetch_array($result))
    {
     $arregloDen[]=$array;
    }
   ?>
   
    <?php
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
    <form  type="post" id='formularioCobro'>
         <h3>Paso 2: Indica el concepto de cobro y el importe</h3>
        
        <label>Concepto de cobro</label>
        <textarea name='concepto'></textarea>
        <label>Importe</label>
        <input type='text' name='cobro'>
        <input type="hidden"  name="idUsuario" value="<?php echo($_GET['idPac']); ?>">
         <input type="hidden"  name="idDentista" value="<?php echo($_SESSION['id']); ?>">
         <input type='submit' value='Expedir'>
    </form>

</div>

<div id="col2">
</div>


