<?php 	
include('../../pdf/fpdf.php');
include('../../conexion.php');
$sql="select nombre,terapia from mueladiente
INNER JOIN odontograma on mueladiente.id_muelaDiente=odontograma.muelaDiente where idPacientes=".$_GET['id'];
$result=mysql_query($sql);
while($array=mysql_fetch_array($result))
{
$arreglo[]=$array;
}
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('../../../IMG/cabecera.png' , 20 ,0, 165 , 37,'PNG', '');
//ESPACIOS EN BLANCO DESPUES DE LA IMAGEN
$pdf->Cell(40,10,'',0,2);
$pdf->Cell(40,10,'',0,2);
$pdf->Cell(40,10,'',0,2);

$pdf->SetFont('Arial','B',12);
$pdf->setX(40);
$pdf->Cell(40,10,'Odontograma del paciente '.utf8_decode($_GET['nombre']),0,2);
$pdf->Cell(40,10,'Expedido por el dentista '.utf8_decode($_GET['dentista']),0,2);
$pdf->SetFont('Arial','B',10);
$pdf->setX(175);
$pdf->Cell(40,10,date("d/m/Y"),0,2);

$pdf->SetFont('Arial','B',10);
$pdf->setX(10);
$pdf->Cell(40,5,'Durango Nte.362a cp:3600 Tepic Nayarit',0,2);
$pdf->Cell(40,5,'CP:3600',0,2);
$pdf->Cell(40,5,'Tepic Nayarit',0,2);
$pdf->Ln();
$pdf->setX(10);
$pdf->Cell(40,10,'          Diente',1);
$pdf->Cell(147,10,'          Tratamiento que se le realiza',1,1);
$pdf->SetFont('Arial','',10);
foreach ($arreglo as $row) 
{
$pdf->Cell(40,10,$row['nombre'],1);
$pdf->Cell(147,10,$row['terapia'],1,1);
}




     

$filename="impresos/".date("d-m-Y")."_".date("h-i-sa").".pdf";
$pdf->Output($filename,'I');
$pdf->Output($filename,'F');
$sql="insert into recetas(ruta,paciente,fecha)values('$filename','".$_POST['nombre']." ".$_POST['apelido']."',NOW())";
mysql_query($sql);
?>