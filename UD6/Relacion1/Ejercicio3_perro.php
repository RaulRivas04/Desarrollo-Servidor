<?php
require_once 'Ejercicio3_Animal.php'; // Asegúrate de incluir la clase base

class Perro extends Animal { // Hereda de Animal
    public function __construct($tamano, $raza, $color, $nombre) {
        parent::__construct($tamano, $raza, $color, $nombre); // Llama al constructor de la clase base
    }

    public function speak() {
        echo "$this->nombre dice: ¡Guau! ¡Guau!<br>"; // Sobrescribe el método speak
    }
}
?>
