<?php 
include('conexion.php');
$idPac=$_GET['idPac'];
$sql="select * from pacientes where idPacientes=$idPac";
$result=mysql_query($sql);
while($array=mysql_fetch_array($result))
{
$arreglo[]=$array;
}
foreach ($arreglo as $row) 
{
$nombre=$row['Pac_Nombre'];
$apellido=$row['Pac_Apellido'];
$correo=$row['Pac_correo'];
$telefono=$row['Pac_telefono'];
$fecha=$row['Pac_FecNac'];
$sexo=$row['Pac_sexo'];
}

 ?>

<h2>Modifica un  paciente</h2>
<form id='modificaPaciente' type='post'>
<input type="hidden" value="<?php echo($_GET['idPac']); ?>" name='idPac'>
<label>Nombre(S)</label>
<input type='text' name='txtnombrepac' placeholder="Solo texto" required maxlength="40" style="text-transform:uppercase" value="<?php echo($nombre); ?>">	
<label>Apellido(S)</label>
<input type='text' name='txtapellido' placeholder="Solo texto"  required maxlength="40" style="text-transform:uppercase" value="<?php echo($apellido); ?>" >
<label>Correo electronico</label>
<input type='email' name='txtcorreo' placeholder="ejemplo@dominio.com"  required maxlength="40" style="text-transform:lowercase" value="<?php echo($correo); ?>">
<label>Numero de tel&eacute;fono</label>
<input type='number' name='txttelefono' value="<?php echo($telefono); ?>">
<label>Fecha de nacimiento</label>
<input type='date' name='txtfecnac' value="<?php echo($fecha); ?>">
<label>Sexo</label>
<select name='sexo'>
 <option value="">Seleccionar uno</option>
<?php 
if($sexo=="Masculino")
{
echo("<option value='Masculino' selected>Masculino</option>
      <option value='Femenino'>Femenino</option>");
}
else
{
echo("<option value='Masculino'>Masculino</option>
      <option value='Femenino' selected>Femenino</option>");
}

 ?>



</select>
<input type='submit' value='Registrar' name='Enviar'>
<input type='reset' value='Limpiar'>
</form>