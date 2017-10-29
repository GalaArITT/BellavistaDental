<?php
    include ('conexion.php');
    $idDen=$_GET['idDen'];
    $sql="select * from dentistas where idDentistas=$idDen";
    $result= mysql_query($sql);

    while($array=mysql_fetch_array($result)){
        $arreglo[]=$array;
    }
    foreach ($arreglo as $row){
        $nombreden=$row['Nombre_Dentista'];
        $apellidoden=$row['Apellido_Dentista'];
        $fechaden=$row['FechaNac'];
        $telefonoden=$row['Telefono'];
    }
?>
<h2>Modifica un paciente</h2>
<form id='modificaDentistaR' type='post'>
    <input type="hidden" value="<?php echo($_GET['idDen']);?>" name='idDen'>
    <label>Nombre(S)</label>
    <input type='text' name='txtnombreden' placeholder="Solo texto" required maxlength="40"
           style="text-transform:uppercase" value="<?php echo("$nombreden");?>">
    <label>Apellido(S)</label>
    <input type='text' name='txtapellidoden' placeholder="Solo texto"  required maxlength="40"
           style="text-transform:uppercase" value="<?php echo("$apellidoden");?>">
    <label>Fecha de nacimiento</label>
    <input type='date' name='txtfecnacden' value="<?php echo("$fechaden");?>">
    <label>Numero de tel&eacute;fono</label>
    <input type='number' name='txttelefonoden' value="<?php echo("$telefonoden");?>">



    <input type='submit' value='Registrar' name='Enviar'>
    <input type='reset' value='Limpiar'>
</form>