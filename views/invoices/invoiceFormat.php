<?php


use Fpdf\Fpdf;

$pdf = new Fpdf('P', 'mm', array(120, 200));

// * Set Page
$pdf->AddPage();
$pdf->SetMargins(8, 0, 0);

// * Set Business Text
$imageURl =  $_SERVER['DOCUMENT_ROOT'] . '\\build\\img\\logo.png';
$pdf->Image($imageURl, 12, 12, 20, 20, '');

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(92, 5, "TEST INVOICE", 0, 2, 'R');

$pdf->SetFont('Arial', '', 4);
$pdf->Cell(88, 2, "Street 123, Internet City", 0, 2, 'R');

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(87.8, 5, "Web Design", 0, 2, 'R');

$imageURl =  $_SERVER['DOCUMENT_ROOT'] . '\\build\\img\\whatsapp.png';
$pdf->Image($imageURl, 75, 25.3, 4, 4, '');
$pdf->Cell(88.7, 5, "00-1234.5678", 0, 2, 'R');

$pdf->Ln(12);

// * Set Invoice Header
$pdf->Cell(20, 5, "Invoice #", 0, 0, 'L');
$pdf->Cell(20, 5, "01", 0, 0, 'L');

$pdf->Cell(20, 5, "Date & Hour", 0, 0, 'L');
$pdf->Cell(0, 5, date('Y-m-d H:i:s'), 0, 1, 'L');

$pdf->Cell(20, 5, "________________________________________________________________________", 0, 0, 'L');


// * Set Customer Data
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(100, 5, "Customer Data", 0, 1, 'C');
$pdf->Cell(18, 5, mb_convert_encoding("Razon Social: ", "ISO-8859-1", "UTF-8"), 0, 0, 'L');

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(5, 5, "Dr. Dre", 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(13, 5, mb_convert_encoding("Address: ", "ISO-8859-1", "UTF-8"), 0, 0, 'L');

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(25, 5, "Compton", 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(6, 5, "DNI: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(25, 5, "12.345.678", 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(9.5, 5, mb_convert_encoding("Phone: ", "ISO-8859-1", "UTF-8"), 0, 0, 'L');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(25, 5, "11.2233.4455", 0, 1, 'L');

$pdf->Cell(20, 5, "________________________________________________________________________", 0, 0, 'L');

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(100, 5, "Products Data", 0, 1, 'C');
$pdf->Ln();

$pdf->Cell(20, 5, "Name", 0, 0, 'L');
$pdf->Cell(50, 5, "Quantity", 0, 0, 'R');
$pdf->Cell(15, 5, "Price", 0, 0, 'R');
$pdf->Cell(15, 5, "Total", 0, 0, 'R');
$pdf->Ln();

$pdf->Cell(20, 5, mb_convert_encoding("Café latinoamericano", "ISO-8859-1", "UTF-8"), 0, 0, 'L');
$pdf->Cell(45, 5, "2", 0, 0, 'R');
$pdf->Cell(20, 5, "$5,00", 0, 0, 'R');
$pdf->Cell(15, 5, "$10,00", 0, 0, 'R');
$pdf->Ln();

$pdf->Cell(20, 5, mb_convert_encoding("Café latinoamericano", "ISO-8859-1", "UTF-8"), 0, 0, 'L');
$pdf->Cell(45, 5, "1", 0, 0, 'R');
$pdf->Cell(20, 5, "$21,00", 0, 0, 'R');
$pdf->Cell(15, 5, "$21,00", 0, 0, 'R');
$pdf->Ln();

$pdf->Cell(20, 5, mb_convert_encoding("Café ", "ISO-8859-1", "UTF-8"), 0, 0, 'L');
$pdf->Cell(45, 5, "10", 0, 0, 'R');
$pdf->Cell(20, 5, "$21,00", 0, 0, 'R');
$pdf->Cell(15, 5, "$21,00", 0, 0, 'R');
$pdf->Ln();

// * Set Output Document
$pdf->Output('invoice_nro_1.pdf', 'I');


/* // Variables desde la base de datos (Ejemplo)
$numeroFactura = '001'; // Puedes traerlo desde la base de datos
$cliente = [
  'nombre' => 'Juan Pérez',
  'identificacion' => '12345678',
  'direccion' => 'Calle Falsa 123',
  'correo' => 'cliente@correo.com'
];

$productos = [
  ['codigo' => '001', 'nombre' => 'Producto 1', 'cantidad' => 2, 'precio' => 100],
  ['codigo' => '002', 'nombre' => 'Producto 2', 'cantidad' => 1, 'precio' => 200],
];

$totalCompra = 0;
foreach ($productos as $producto) {
  $totalCompra += $producto['cantidad'] * $producto['precio'];
}

// Estilo del documento


// Agregar productos

// Escribir el contenido HTML al PDF

// Salida del PDF (se descarga automáticamente)
 */