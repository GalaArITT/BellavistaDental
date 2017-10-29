<?php
include('../../conexion.php');
$concepto=$_POST['concepto'];
$cobro=$_POST['cobro'];
$idUsuario=$_POST['idUsuario'];
$idDentista=$_POST['idDentista'];

$sql="insert into pagos(id_dentista,id_paciente,concepto,importe,fecha)values($idDentista,$idUsuario,'$concepto',$cobro,NOW())";
if(mysql_query($sql))
{
echo("Recibo de pago expedido correctamente-PrincipalDentista.php");
}

?>