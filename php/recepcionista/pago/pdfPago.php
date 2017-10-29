<?php 	
include('../../pdf/fpdf.php');
include('../../conexion.php');
$idPago=$_GET['id_pago'];
$sql="select id_pago,concat(Nombre_Dentista,' ',Apellido_Dentista) as 'dentista',cedula_prof,
concat(Pac_Nombre,' ',Pac_Apellido) as'paciente',concepto,importe,pago,
date(fecha)as'fecha' from pagos
inner join dentistas on dentistas.idDentistas=pagos.id_dentista
inner join pacientes on pacientes.idPacientes=pagos.id_paciente
where id_pago=$idPago";


$result=mysql_query($sql);
while($array=mysql_fetch_array($result))
{
$arregloPago[]=$array;
}

foreach ($arregloPago as $row) 
{
 $dentista=$row['dentista'];
  $paciente=$row['paciente'];
   $concepto=$row['concepto'];
    $importe=$row['importe'];
     $pago=$row['pago'];
      $fecha=$row['fecha'];
      $cedula_prof=$row['cedula_prof'];
}

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('../../../IMG/cabecera.png' , 46 ,0, 120 , 26,'PNG', '');
//ESPACIOS EN BLANCO DESPUES DE LA IMAGEN
$pdf->Cell(40,10,'',0,2);
$pdf->Cell(40,10,'',0,2);
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5,'Folio: '.$idPago,1,2);
$pdf->SetFont('Arial','B',12);
$pdf->setX(65);
$pdf->Cell(40,10,'DR '.strtoupper($dentista),0,2);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40,10,'Cedula prof. '.$cedula_prof,0,2);
$pdf->SetFont('Arial','B',10);
$pdf->setX(85);
$pdf->Cell(40,10,'RECIBO DE PAGO',0,2);

$pdf->SetFont('Arial','B',10);
$pdf->setX(175);
$pdf->Cell(40,10,$fecha,0,2);

$pdf->SetFont('Arial','B',10);
$pdf->setX(10);
$pdf->Cell(40,5,'Durango Nte.362a cp:3600 Tepic Nayarit',0,2);
$pdf->Cell(40,5,'CP:3600',0,2);
$pdf->Cell(40,5,'Tepic Nayarit',0,2);

$pdf->Cell(40,10,'Datos del paciente:',0,2);
      $pdf->Cell(30,5,"Nombre:",0);
      $pdf->Cell(159,5,utf8_decode($paciente),0);
      $pdf->Ln();
      $pdf->Ln();
      $pdf->SetFont('Arial','B',10);
$pdf->setX(10);
$pdf->Cell(40,10,'Concepto de cobro',0,2);
$pdf->SetFont('Arial','',10);
   
   
        $pdf->MultiCell(189, 5,$concepto,1 ,'J',false);
        $pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,10,'Importe',0,2);
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,10,$importe,1,2);
        
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,10,'A cuenta',0,2);
$pdf->SetFont('Arial','',10);
$pdf->Cell(15,10,$pago,1,2);
     
$filename="impresos/".date("d-m-Y")."_".date("h-i-sa").".pdf";
$pdf->Output($filename,'I');
$pdf->Output($filename,'F');
?>