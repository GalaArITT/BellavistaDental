<h2>Registra un nuevo utensilio al inventario</h2>

<form id='nuevoInventario' type='post'>
<h2>Datos del utensilio</h2>
<label>Nombre</label>
<input type='text' name='nombre' required maxlength="200" style="text-transform:uppercase">	
<label>Cantidad</label>
<input type='number' name='cantidad'  min="0" required>

<input type='submit' value='Registrar' name='Enviar'>
<input type='reset' value='Limpiar'>
</form>