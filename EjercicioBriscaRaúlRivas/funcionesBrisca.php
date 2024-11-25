<?php
// Palos de la baraja
$palos = ['oros', 'copas', 'espadas', 'bastos'];

// Valores de las cartas
$valores = [
    '1' => 'As',
    '2' => 'Dos',
    '3' => 'Tres',
    '4' => 'Cuatro',
    '5' => 'Cinco',
    '6' => 'Seis',
    '7' => 'Siete',
    '10' => 'Sota',
    '11' => 'Caballo',
    '12' => 'Rey'
];

// Función para crear y barajar la baraja
function crearBaraja() {
    global $palos, $valores;
    $baraja = [];
    foreach ($palos as $palo) {
        foreach ($valores as $numero => $nombre) {
            $baraja[] = ["nombre" => $nombre, "palo" => $palo, "numero" => $numero];
        }
    }
    shuffle($baraja);
    return $baraja;
}

// Función para repartir cartas
function repartirCartas(&$baraja) {
    $cartasJugador = array_splice($baraja, 0, 3); // Repartimos 3 cartas
    $bazaJugador = array_splice($baraja, 0, 10); // Sacamos 10 cartas para la baza
    return [$cartasJugador, $bazaJugador];
}

// Función para calcular puntos de la baza
function calcularPuntos($bazaJugador) {
    $puntosCarta = [
        'As' => 11,
        'Tres' => 10,
        'Rey' => 4,
        'Caballo' => 3,
        'Sota' => 2,
        'Dos' => 0,
        'Cuatro' => 0,
        'Cinco' => 0,
        'Seis' => 0,
        'Siete' => 0
    ];
    $totalPuntos = 0;
    foreach ($bazaJugador as $carta) {
        $totalPuntos += $puntosCarta[$carta['nombre']];
    }
    return $totalPuntos;
}

// Función para mostrar cartas con imagen
function mostrarCartasConImagen($cartas) {
    $html = "<ul style='list-style-type: none; display: flex;'>";
    foreach ($cartas as $carta) {
        $nombreArchivo = strtolower($carta['palo']) . "_" . $carta['numero'] . ".jpg";
        $html .= "<li style='margin: 10px; text-align: center;'>";
        $html .= "<img src='imagenes/{$nombreArchivo}' alt='{$carta['nombre']} de {$carta['palo']}' style='width:100px;'><br>";
        $html .= "{$carta['nombre']} de {$carta['palo']}</li>";
    }
    $html .= "</ul>";
    return $html;
}
?>
