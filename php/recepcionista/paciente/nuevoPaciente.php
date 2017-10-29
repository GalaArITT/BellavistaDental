<h2>Registra un nuevo paciente</h2>
<form id='nuevoPaciente' type='post'>
<label>Nombre(S)</label>
<input type='text' name='txtnombrepac' placeholder="Solo texto" required maxlength="40" style="text-transform:uppercase">	
<label>Apellido(S)</label>
<input type='text' name='txtapellido' placeholder="Solo texto"  required maxlength="40" style="text-transform:uppercase">
<label>Correo electronico</label>
<input type='email' name='txtcorreo' placeholder="ejemplo@dominio.com"  required maxlength="40" style="text-transform:lowercase">
<label>Numero de tel&eacute;fono</label>
<input type='number' name='txttelefono'>
<label>Fecha de nacimiento</label>
<input type='date' name='txtfecnac'>
<label>Sexo</label>
<select name='sexo'>
 <option value="">Seleccionar uno</option>
<option value='Masculino'>Masculino</option>
<option value='Femenino'>Femenino</option>	
</select>
<input type='submit' value='Registrar' name='Enviar'>
<input type='reset' value='Limpiar'>
</form>