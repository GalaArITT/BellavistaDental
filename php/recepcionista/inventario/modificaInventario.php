<?php 
include('conexion.php');
$id=$_GET['id'];
$sql="select * from inventario where id_utensilio=$id";
$result=mysql_query($sql);
while($array=mysql_fetch_array($result))
{
$arreglo[]=$array;
}
foreach ($arreglo as $row) 
{
$nombre=$row['nombre'];
$cantidad=$row['cantidad'];
}

 ?>

<h2>Modifica un utensilio del inventario</h2>
<form id='modificaInventario' type='post'>
<h2>Datos del utensilio</h2>
<input type='hidden' name='id_utensilio' value='<?php echo($id); ?>'>
<label>Nombre</label>
<input type='text' name='nombre' value="<?php echo($nombre); ?>" required maxlength="200" style="text-transform:uppercase">	
<label>Cantidad</label>
<input type='number' name='cantidad'  value="<?php echo($cantidad); ?>" min="0" required>
<input type='submit' value='Actualizar' name='Enviar'>
<input type='reset' value='Limpiar'>
</form>