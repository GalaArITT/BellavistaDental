<?php 	
include('../../pdf/fpdf.php');
include('../../conexion.php');
$idDent=$_POST['idDent'];
$idPac=$_POST['idPac'];
$nombrePac=$_POST['nombre']." ".$_POST['apelido'];
$indicacion=$_POST['medicamento'];
$sql="insert into recetas(paciente,indicacion,idPacientes,idDentistas,fecha)values('$nombrePac','$indicacion',$idPac,$idDent,NOW())";
mysql_query($sql);
$sqlID="select  * from recetas order by fecha desc limit 1";
$result=mysql_query($sqlID);
while($array=mysql_fetch_array($result))
{
$arreglo[]=$array;
}

foreach ($arreglo as $row)
{
 $idRec=$row['idRecetas'];
}

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image('../../../IMG/cabecera.png' , 46 ,0, 120 , 26,'PNG', '');
//ESPACIOS EN BLANCO DESPUES DE LA IMAGEN
$pdf->Cell(40,10,'',0,2);
$pdf->Cell(40,10,'',0,2);
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5,'Folio: '.$idRec,1,2);
$pdf->SetFont('Arial','B',12);
$pdf->setX(65);
$pdf->Cell(40,10,'DR '.strtoupper($_POST['dentista']),0,2);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40,10,'Cedula prof. '.$_POST['ced'],0,2);
$pdf->SetFont('Arial','B',10);
$pdf->setX(85);
$pdf->Cell(40,10,'RECETA MEDICA',0,2);

$pdf->SetFont('Arial','B',10);
$pdf->setX(175);
$pdf->Cell(40,10,date("d/m/Y"),0,2);

$pdf->SetFont('Arial','B',10);
$pdf->setX(10);
$pdf->Cell(40,5,'Durango Nte.362a cp:3600 Tepic Nayarit',0,2);
$pdf->Cell(40,5,'CP:3600',0,2);
$pdf->Cell(40,5,'Tepic Nayarit',0,2);

$pdf->Cell(40,10,'Datos del paciente:',0,2);
      $pdf->Cell(30,5,"Nombre:",0);
      $pdf->Cell(159,5,utf8_decode(   $_POST['nombre']." ".$_POST['apelido'] ),0);
      $pdf->Ln();
      $pdf->Cell(36,5,"Telefono:",0);
      $pdf->Cell(153,5,$_POST['telefono'] ,0);
      $pdf->Ln();
      
       $pdf->Ln();
       $pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->setX(10);
$pdf->Cell(40,10,'Prescripcion medica',0,2);
$pdf->SetFont('Arial','',10);
   
   
        $pdf->MultiCell(189, 5,$_POST['medicamento'],1 ,'J',false);
        $pdf->Ln();
  
     
     
        
         $pdf->Ln();


$pdf->setY(190);
$pdf->setX(80);
 $pdf->Ln();

         $pdf->Ln();

         $pdf->Image('../../../IMG/firma.png' , 0, 190, 180 , 40,'PNG', '');
     

$filename="pdfRecetas/".date("d-m-Y")."_".date("h-i-sa").".pdf";
$sql="update recetas set ruta='$filename' where idRecetas=$idRec";
mysql_query($sql);
$pdf->Output($filename,'I');
$pdf->Output($filename,'F');
?>