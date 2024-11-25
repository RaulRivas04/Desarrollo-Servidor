<?php 

//1º Parte realizada por Raúl Rivas Ortega

// Incluir la biblioteca FPDF
require('fpdf186/fpdf.php');

// Verificar si la clase FPDF está cargada
if (!class_exists('FPDF')) {
    die("Error: La clase FPDF no está definida. Revisa la ruta de la biblioteca.");
}

// Datos del equipo de baloncesto
$equipo = utf8_decode("Your Team");
$temporada = utf8_decode("Temporada 2024/2025");
$introduccion = utf8_decode("Bienvenidos a la temporada 2024/2025 del equipo de baloncesto 'Your Team'. Somos un equipo comprometido con el desarrollo de habilidades deportivas y la promoción de valores como el trabajo en equipo, la disciplina y el respeto.");
$precioInscripcion = utf8_decode("100€");
$horarios = utf8_decode("Lunes, Miércoles y Viernes de 18:00 a 20:00");

// Información de jugadores
$jugadores = [
    ["Nombre" => utf8_decode("Raúl"), "Apellido" => utf8_decode("Rivas"), "Posición" => utf8_decode("Alero"), "Edad" => 20, "Altura" => "1.81m", "Peso" => "77kg"],
    ["Nombre" => utf8_decode("Carlos"), "Apellido" => utf8_decode("Santander"), "Posición" => utf8_decode("Escolta"), "Edad" => 19, "Altura" => "1.93m", "Peso" => "98kg"],
    ["Nombre" => utf8_decode("Luis"), "Apellido" => utf8_decode("Martínez"), "Posición" => utf8_decode("Base"), "Edad" => 27, "Altura" => "1.90m", "Peso" => "85kg"],
    ["Nombre" => utf8_decode("Carla"), "Apellido" => utf8_decode("Rodríguez"), "Posición" => utf8_decode("Ala-Pívot"), "Edad" => 24, "Altura" => "1.88m", "Peso" => "82kg"],
    ["Nombre" => utf8_decode("Ana"), "Apellido" => utf8_decode("López"), "Posición" => utf8_decode("Pívot"), "Edad" => 26, "Altura" => "1.92m", "Peso" => "90kg"],
    ["Nombre" => utf8_decode("Marta"), "Apellido" => utf8_decode("García"), "Posición" => utf8_decode("Base"), "Edad" => 22, "Altura" => "1.75m", "Peso" => "70kg"],
    ["Nombre" => utf8_decode("Jorge"), "Apellido" => utf8_decode("Fernández"), "Posición" => utf8_decode("Escolta"), "Edad" => 28, "Altura" => "1.86m", "Peso" => "79kg"],
    ["Nombre" => utf8_decode("Lucía"), "Apellido" => utf8_decode("Gómez"), "Posición" => utf8_decode("Alero"), "Edad" => 24, "Altura" => "1.82m", "Peso" => "76kg"],
    ["Nombre" => utf8_decode("Pedro"), "Apellido" => utf8_decode("Ruiz"), "Posición" => utf8_decode("Ala-Pívot"), "Edad" => 29, "Altura" => "1.89m", "Peso" => "87kg"],
];

$logo = 'logo.jpg';

// Creación del PDF
$pdf = new FPDF();
$pdf->AddPage();

// Colores de fondo y texto
$pdf->SetFillColor(255, 230, 230);
$pdf->SetTextColor(0);

// Agregar la imagen centrada en el PDF
$logoWidth = 50;
$x = ($pdf->GetPageWidth() - $logoWidth) / 2;
if (file_exists($logo)) {
    $pdf->Image($logo, $x, 10, $logoWidth);
}
$pdf->Ln(60);

// Introducción con borde especial
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetFillColor(200, 50, 50);
$pdf->SetTextColor(255);
$pdf->Cell(0, 10, "Equipo de Baloncesto", 1, 1, 'C', true);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0);
$pdf->SetFillColor(255, 240, 240);
$pdf->MultiCell(0, 10, $introduccion, 1, 'C', true);
$pdf->Ln(15);

// Información del equipo y temporada
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, "Equipo: $equipo", 0, 1, 'C');
$pdf->Cell(0, 10, "Temporada: $temporada", 0, 1, 'C');
$pdf->Ln(10);

// Título para la primera tabla
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(200, 50, 50); // Rojo suave para el título
$pdf->Cell(0, 10, utf8_decode("Posiciones de los Jugadores"), 0, 1, 'C');
$pdf->Ln(5);

// Tabla 1: Posición del jugador
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 50, 50);
$pdf->SetTextColor(255);
$pdf->SetX(($pdf->GetPageWidth() - 180) / 2);
$pdf->Cell(60, 10, utf8_decode('Nombre'), 1, 0, 'C', true);
$pdf->Cell(60, 10, utf8_decode('Apellido'), 1, 0, 'C', true);
$pdf->Cell(60, 10, utf8_decode('Posición'), 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0);
$fill = false;
foreach ($jugadores as $jugador) {
    $pdf->SetX(($pdf->GetPageWidth() - 180) / 2);
    $pdf->SetFillColor(255, 210, 210);
    $pdf->Cell(60, 10, $jugador["Nombre"], 1, 0, 'C', $fill);
    $pdf->Cell(60, 10, $jugador["Apellido"], 1, 0, 'C', $fill);
    $pdf->Cell(60, 10, $jugador["Posición"], 1, 1, 'C', $fill);
    $fill = !$fill;
}

//2º Parte realizada por Carlos Santander Jimenez

// Espacio antes de la segunda tabla
$pdf->Ln(15);

// Título para la segunda tabla
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(200, 50, 50);
$pdf->Cell(0, 10, utf8_decode("Información Adicional de los Jugadores"), 0, 1, 'C');
$pdf->Ln(5);

// Tabla 2: Edad, altura y peso
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(200, 50, 50);
$pdf->SetTextColor(255);
$pdf->SetX(($pdf->GetPageWidth() - 180) / 2);
$pdf->Cell(60, 10, utf8_decode('Nombre'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Edad'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Altura'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Peso'), 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0);
$fill = false;
foreach ($jugadores as $jugador) {
    $pdf->SetX(($pdf->GetPageWidth() - 180) / 2);
    $pdf->SetFillColor(255, 210, 210);
    $pdf->Cell(60, 10, $jugador["Nombre"], 1, 0, 'C', $fill);
    $pdf->Cell(40, 10, $jugador["Edad"], 1, 0, 'C', $fill);
    $pdf->Cell(40, 10, $jugador["Altura"], 1, 0, 'C', $fill);
    $pdf->Cell(40, 10, $jugador["Peso"], 1, 1, 'C', $fill);
    $fill = !$fill;
}

// Información de inscripción y horarios
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(200, 50, 50);
$pdf->Cell(0, 10, utf8_decode("Información de Inscripción y Horarios"), 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0);
$pdf->Cell(0, 10, utf8_decode("Precio de Inscripción: ") . $precioInscripcion, 0, 1, 'C');
$pdf->Cell(0, 10, utf8_decode("Horarios de Entrenamiento: ") . $horarios, 0, 1, 'C');

// Imagen
$pdf->Ln(20);
$pdf->Image($logo, $x, $pdf->GetY(), $logoWidth);

// Generar PDF
$pdf->Output();
?>
