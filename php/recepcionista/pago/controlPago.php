<?php 
include('../../conexion.php');
$id_pago=$_POST['id_pago'];
$sql="update pagos set pago=importe where id_pago=$id_pago";

if(mysql_query($sql))
{
echo("Pago liquidado correctamente-PrincipalRecepcionista.php?action=verPagos");
}
?>