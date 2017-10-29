<h2>Expide una receta a <?php echo($_GET['nombre']." ".$_GET['apellido']); ?></h2>
<h3>Paso 2: llena la prescripci&oacute;n</h3>
<?php 
$id=$_GET['id'];
$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$correo=$_GET['correo'];
$telefono=$_GET['telefono'];
$sexo=$_GET['sexo'];
$dentista=$_SESSION['dentista'];
$idDent=$_SESSION['id'];
$ced=$_SESSION['ced'];

echo("<form method='post'  action='dentista/receta/pdfReceta.php'>
<h2>Datos del medico</h2>
<input type='hidden' name='idDent' value='$idDent' required>
<label>Nombre(s)</label>
<input type='text' name='dentista' value='$dentista' readonly>
<br>	
 <h2>Datos del paciente</h2>
<input type='hidden' name='idPac' value='$id' required>
<input type='hidden' name='ced' value='$ced' required>
<label>Nombre(s)</label>	
<input type='text' name='nombre' value='$nombre' required readonly>
<label>Apellido(s)</label>	
<input type='text' name='apelido' value='$apellido' required readonly>
<label>Telefeno</label>	
<input type='text' name='telefono' value='$telefono' required readonly>
<br>
 <h2>Prescripcion</h2>
 <label>Tipo de prescripcion</label>
 <select onChange='cambiaPresc()' id='seleccPresc'>
<option value='libre'>Libre</option>
<option value='tabla'>Tabla</option>
 </select>
 <div id='tipoPresc'>
  <textarea name='medicamento' placeholder='Escribe tu prescripcion'></textarea>
 </div>

<input type='submit' value='Expedir'>
</form>");

 ?>

 <script>
function cambiaPresc()
{
var selecc=document.getElementById("seleccPresc");  
var tipo=selecc.options[selecc.selectedIndex].value;
var padre=document.getElementById("tipoPresc");
  if(tipo=="tabla")
  {
  	var tabla="<table id='tablaMed'><tr><th>Medicamento</th><th>Indicacion</th></tr>";
   for(var i=0;i<8;i++)
   {
    tabla=tabla+"<tr><td><input type='text' name='medicamento[]'></td><td ><input type='text' name='indicacion[]'></td></tr>";
   }

   tabla=tabla+"</table>";
   padre.innerHTML=tabla;
  }

  if(tipo=="libre")
  {
   padre.innerHTML="<textarea name='medicamento' placeholder='Escribe tu prescripcion'></textarea>";
  }
}
 </script>


