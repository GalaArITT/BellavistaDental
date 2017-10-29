<?php 
$id=$_GET['id'];
$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$correo=$_GET['correo'];
$telefono=$_GET['telefono'];
$sexo=$_GET['sexo'];
$dentista=$_SESSION['dentista'];



echo("<form method='post'  action='receta/pdfReceta.php'>
<h2>Datos del medico</h2>
<input type='hidden' name='id' value='$id' required>
<label>Nombre(s)</label>
<input type='text' name='dentista' value='$dentista' readonly>
<br>	
 <h2>Datos del paciente</h2>
<input type='hidden' name='id' value='$id' required>
<label>Nombre(s)</label>	
<input type='text' name='nombre' value='$nombre' required readonly>
<label>Apellido(s)</label>	
<input type='text' name='apelido' value='$apellido' required readonly>
<label>Telefeno</label>	
<input type='text' name='telefono' value='$telefono' required readonly>
<br>
 <h2>Medicamento</h2>
 <textarea name='medicamento'></textarea>
<input type='submit' value='Expedir'>
</form>");

 ?>


