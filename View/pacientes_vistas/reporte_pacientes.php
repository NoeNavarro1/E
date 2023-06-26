<?php

require_once ('../../inc/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->image('../../img/ecovida.jpg', 150, 1, 60); // X, Y, Tamaño
        $this->Ln(20);
        // Arial bold 15
        $this->SetFont('Arial','B',20);
  
        // Movernos a la derecha
        $this->Cell(60);

        // Título
        $this->Cell(70,10,'Tabla de usuarios',0,0,'C');
        // Salto de línea
   
        $this->Ln(30);
        $this->SetFont('Arial','B',10);
        $this->SetX(8);
        $this->Cell(15,10,'ID',1,0,'C',0);
        $this->Cell(35,10,'Nombre',1,0,'C',0);
        $this->Cell(35,10,'Apellido Paterno',1,0,'C',0);
        $this->Cell(35,10,'Apellido Materno',1,0,'C',0);
        $this->Cell(40,10,'Empresa',1,1,'C',0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
    }
}

$conexion=mysqli_connect("localhost","root","","ecovida");
mysqli_set_charset($conexion, "utf8"); // Establecer la codificación de caracteres UTF-8
$consulta = "SELECT pacientes.id, pacientes.name, pacientes.apepat, pacientes.apemat, pacientes.empresa FROM pacientes";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(8);
    $pdf->Cell(15,10,$row['id'],1,0,'C',0);
    $pdf->Cell(35,10,utf8_decode($row['name']),1,0,'C',0);
    $pdf->Cell(35,10,utf8_decode($row['apepat']),1,0,'C',0);
    $pdf->Cell(35,10,utf8_decode($row['apemat']),1,0,'C',0);
    $pdf->Cell(40,10,utf8_decode($row['empresa']),1,1,'C',0);
}

$pdf->Output();
?>