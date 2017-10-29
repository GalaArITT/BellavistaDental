<?php 
include('conexion.php'); 
$query="select * from pacientes where idPacientes=".$_SESSION['idPacientes'];

$result=mysql_query($query);
while($array=mysql_fetch_array($result))
{
$arreglo[]=$array;
}
?>
<h2>Mi Cuenta</h2>
<div id='cara'><img src="../IMG/usuario.png"></div>
<div id='datos'>
	<div id='col1'>
	<div id='fila'>Nombre</div>
    <div id='fila'>Correo</div>
	<div id='fila'>Telefono</div>
	<div id='fila'>Contrase&ntilde;a</div>
	</div>
	<div id='col2'>
<?php 

foreach ($arreglo as $row)
{
echo("<div id='fila'>".$row['Pac_Nombre']." ".$row['Pac_Apellido']."</div>");
echo("<div id='fila'>".$row['Pac_correo']."</div>");
echo("<div id='fila'>".$row['Pac_telefono']."</div>");
echo("<div id='fila'><a id='botonClave'>Cambia tu contrasena</a></div>");
}
?>
</div> 
<div id='formContrasena'>
<form id='cambiarContrasena'>
<p id='cerrarClave'>X</p>
<label>Contrase&ntilde;a actual</label>	
<input type='password' name='claveActual' required>
<label>Contrase&ntilde;a nueva</label>	
<input type='password' name='claveNueva' required>
<input type='hidden' name='user' value="<?php echo($_SESSION['user']) ?>">
<input type='submit' value='Cambiar'>
</form>
</div>
</div>

<script>
$('#formContrasena').hide();
$(document).ready(function(){
		$("#botonClave").click(function(){
			 $('#formContrasena').show();
			
		});

		$("#cerrarClave").click(function(){
			 $('#formContrasena').hide();
			
		});
	})
		
</script>