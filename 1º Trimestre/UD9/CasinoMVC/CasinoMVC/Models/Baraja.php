<?php

class Baraja {
    private $cartas;

    public function __construct() {
        // Inicializa las cartas en la sesión si no están definidas
        $this->cartas = isset($_SESSION['cartas']) ? $_SESSION['cartas'] : $this->inicializarBaraja();
    }

    private function inicializarBaraja() {
        $palos = ['bastos', 'copas', 'espadas', 'oros'];
        $barajaGenerada = [];

        foreach ($palos as $palo) {
            for ($numero = 1; $numero <= 12; $numero++) {
                $barajaGenerada[] = "{$palo}_{$numero}";
            }
        }
        // Mezcla las cartas al crearlas
        shuffle($barajaGenerada);
        $_SESSION['cartas'] = $barajaGenerada;
        return $barajaGenerada;
    }

    public function obtenerCartas() {
        // Retorna el mazo actual
        return $this->cartas;
    }

    public function barajar() {
        // Reinicia la baraja mezclada
        $this->cartas = $this->inicializarBaraja();
        return $this->cartas;
    }

    public function sacarCarta() {
        // Extrae una carta del mazo
        if (!empty($this->cartas)) {
            $ultimaCarta = array_pop($this->cartas);
            // Actualiza la sesión con el mazo restante
            $_SESSION['cartas'] = $this->cartas;
            return $ultimaCarta;
        }
        return null;
    }

    public function repartir($jugadores, $cartasPorJugador) {
        // Inicializa las manos de los jugadores
        $mano = array_fill(0, $jugadores, []);

        for ($ronda = 0; $ronda < $cartasPorJugador; $ronda++) {
            foreach ($mano as &$jugador) {
                if (!empty($this->cartas)) {
                    $jugador[] = array_pop($this->cartas);
                }
            }
        }

        // Actualiza el mazo restante en la sesión
        $_SESSION['cartas'] = $this->cartas;
        return $mano;
    }
}


