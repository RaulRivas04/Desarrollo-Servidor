<?php
$notas = [
    "Matemáticas" => [3, 10, 7],
    "Lengua" => [8, 5, 3],
    "Física" => [7, 2, 1],
    "Latín" => [4, 7, 8],
    "Inglés" => [6, 2, 3]
];

function calcularMedia($notasAsignatura) {
    return round(array_sum($notasAsignatura) / count($notasAsignatura), 1);
}

function calcularMediaTotal($notas) {
    $total = 0;
    foreach ($notas as $notasAsignatura) {
        $total += calcularMedia($notasAsignatura);
    }
    return round($total / count($notas), 1);
}

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Asignatura</th><th>Trimestre 1</th><th>Trimestre 2</th><th>Trimestre 3</th><th>Media</th></tr>";

foreach ($notas as $asignatura => $notasAsignatura) {
    echo "<tr><td>$asignatura</td>";
    foreach ($notasAsignatura as $nota) {
        echo "<td>$nota</td>";
    }
    echo "<td>" . calcularMedia($notasAsignatura) . "</td></tr>";
}

echo "</table>";

echo "<p>La media total es " . calcularMediaTotal($notas) . "</p>";
?>