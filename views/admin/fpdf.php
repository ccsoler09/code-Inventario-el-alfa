<?php
require('assets/fpdf/fpdf.php');
$array_js;
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
     // Logo
    // Arial bold 15
    $this->SetFont('Arial','B',9);
    // Movernos a la derecha
    $this->Cell(80);
    $this->Cell(30,10,'INVENTARIO EL ALFA',-210,0,'C');
    $this->Image('assets/img/welcome.jpg',75,20,60);
    // Título
    $this->Ln(60);
}
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}

$conexion = mysqli_connect('localhost', 'root', '', 'dbo_inventarioelalfa');
$query = "SELECT * FROM facturas INNER JOIN personas ON facturas.cliente_id = personas.id_persona INNER JOIN registros ON facturas.usuario_id = registros.id WHERE id_factura = '$codigo' ";
$consulta = mysqli_query($conexion,$query);

$query_1 = "SELECT * FROM facturas INNER JOIN personas ON facturas.cliente_id = personas.id_persona INNER JOIN registros ON facturas.usuario_id = registros.id WHERE id_factura = '$codigo' ";
$consulta_1 = mysqli_query($conexion,$query_1);

$query_2 = "SELECT * FROM facturas INNER JOIN personas ON facturas.cliente_id = personas.id_persona INNER JOIN registros ON facturas.usuario_id = registros.id WHERE id_factura = '$codigo' ";
$consulta_2 = mysqli_query($conexion,$query_2);

$query_3 = "SELECT * FROM facturas INNER JOIN personas ON facturas.cliente_id = personas.id_persona INNER JOIN registros ON facturas.usuario_id = registros.id WHERE id_factura = '$codigo'  ";
$consulta_3 = mysqli_query($conexion,$query_3);

$products = $array_js;
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',9);

$pdf->Cell(50,10,'DATOS DE CLIENTE',0,1,'C');
$pdf->Cell(50,10, utf8_decode('Codigo de factura'),1,0,'C');
$pdf->Cell(50,10, utf8_decode('Fecha'),1,0,'C');
$pdf->Cell(95,10, utf8_decode('Nombres del cliente'),1,1,'C');

while ($row = $consulta->fetch_assoc()) {
	$pdf -> Cell (50, 10, utf8_decode($row['codigo_factura']),1,0,'c',0);
	$pdf -> Cell (50, 10, utf8_decode($row['fecha_factura']),1,0,'c',0);
	$pdf -> Cell (95, 10, utf8_decode($row['PersoNombres']),1,0,'c',0);
}

$pdf->Ln(10);
$pdf->Cell(50,10, utf8_decode('Dirección'),1,0,'C');
$pdf->Cell(50,10, utf8_decode('Teléfono'),1,0,'C');
$pdf->Cell(50,10, utf8_decode('Tipo de documento'),1,0,'C');
$pdf->Cell(45,10, utf8_decode('Número de documento'),1,1,'C');
while ($row = $consulta_1->fetch_assoc()) {
	$pdf -> Cell (50, 10, utf8_decode($row['Direccion']),1,0,'c',0);
	$pdf -> Cell (50, 10, utf8_decode($row['Telefono']),1,0,'c',0);
	$pdf -> Cell (50, 10, utf8_decode($row['TipoDoc']),1,0,'c',0);
	$pdf -> Cell (45, 10, utf8_decode($row['documento']),1,1,'c',0);
}

$pdf->Ln(10);

$pdf->Cell(50,10,'DATOS DE VENDEDOR',0,1,'C');
$pdf->Cell(60,10, utf8_decode('Nombre del vendedor'),1,0,'C');
$pdf->Cell(60,10, utf8_decode('Empresa'),1,0,'C');
$pdf->Cell(75,10, utf8_decode('Correo'),1,1,'C');

while ($row = $consulta_2->fetch_assoc()) {
	$pdf -> Cell (60, 10, utf8_decode($row['nombre']),1,0,'c',0);
	$pdf -> Cell (60, 10, utf8_decode('Inventario El Alfa'),1,0,'c',0);
	$pdf -> Cell (75, 10, utf8_decode($row['email']),1,0,'c',0);
}

$pdf->Ln(20);

$pdf->Cell(50,10,'PRODUCTOS SELECCIONADOS',0,1,'C');
$pdf->Cell(60,10, utf8_decode('Producto'),1,0,'C');
$pdf->Cell(40,10, utf8_decode('Valor unitario'),1,0,'C');
$pdf->Cell(40,10, utf8_decode('Cantidad'),1,0,'C');
$pdf->Cell(55,10, utf8_decode('Total'),1,1,'C');	

foreach($products as &$product){
	$pdf -> Cell (60, 10, utf8_decode($product->nombre),1,0,'c',0);
	$pdf -> Cell (40, 10, utf8_decode('$'. $product->valor_unitario),1,0,'c',0);
	$pdf -> Cell (40, 10, utf8_decode($product->cantidad),1,0,'c',0);
	$pdf -> Cell (55, 10, utf8_decode('$'. $product->precio),1,1,'c',0);
}

$pdf->Ln(20);

$pdf->Cell(50,10,'VENTA FINALIZADA',0,1,'C');
$pdf->Cell(60,10, utf8_decode('Subtotal'),1,0,'C');
$pdf->Cell(60,10, utf8_decode('IVA'),1,0,'C');
$pdf->Cell(75,10, utf8_decode('TOTAL'),1,1,'C');

while ($row = $consulta_3->fetch_assoc()) {
	$pdf -> Cell (60, 10, utf8_decode('$'. $row['subtotal']),1,0,'c',0);
	$pdf -> Cell (60, 10, utf8_decode($row['iva'] . '%'),1,0,'c',0);
	$pdf -> Cell (75, 10, utf8_decode('$'. $row['total']),1,0,'c',0);
}


$pdf->Ln(40);

$pdf->Cell(50,10,'CREDENCIALES',0,1,'C');
$pdf->Cell(60,10, utf8_decode('SELLO'),1,0,'C');
$pdf->Cell(60,10, utf8_decode('FIRMA CLIENTE'),1,0,'C');
$pdf->Cell(75,10, utf8_decode('FIRMA ENTIDAD'),1,1,'C');
$pdf -> Cell (60, 30, utf8_decode(''),1,0,'c',0);
$pdf -> Cell (60, 30, utf8_decode(''),1,0,'c',0);
$pdf -> Cell (75, 30, utf8_decode(''),1,0,'c',0);
$pdf->Output();
?>
