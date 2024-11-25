<?php
// Clase Animal
class Animal {
    public function __construct(
        public string $nombre,
        public string $tipo
    ) {}

    public function describir(): string {
        return "Soy un $this->tipo y me llamo $this->nombre.";
    }
}

// Clase Coche que hereda de Animal
class Coche extends Animal {
    // Promoción de propiedades en el constructor
    public function __construct(
        string $nombre,
        public string $color,
        public string $marca,
        public string $modelo,
        public int $caballos = 500,
        public int $plazas = 4
    ) {
        // Llamada al constructor de la clase padre (Animal)
        parent::__construct($nombre, "Máquina");
        $this->velocidad = 0;
    }

    public int $velocidad;

    // Método para acelerar (incrementa la velocidad en 1)
    public function acelerar(): void {
        $this->velocidad++;
    }

    // Método para frenar (reduce la velocidad en 1)
    public function frenar(): void {
        if ($this->velocidad > 0) {
            $this->velocidad--;
        }
    }

    // Método para cambiar el color del coche
    public function cambiarColor(string $nuevoColor): void {
        $this->color = $nuevoColor;
    }

    // Método que sobrescribe "describir" de Animal para personalizarlo
    public function describir(): string {
        return "Soy un coche de marca $this->marca, modelo $this->modelo, color $this->color.";
    }
}
?>
