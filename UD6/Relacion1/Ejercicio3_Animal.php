<?php
class Animal {
    protected $tamano;
    protected $raza;
    protected $color;
    protected $nombre;

    public function __construct($tamano, $raza, $color, $nombre) {
        $this->tamano = $tamano;
        $this->raza = $raza;
        $this->color = $color;
        $this->set_nombre($nombre);
    }

    public function mostrar_propiedades() {
        echo "El tamaño del animal es $this->tamano, su color es $this->color, su raza es $this->raza y su nombre es $this->nombre.<br>";
    }

    public function speak() {
        echo "$this->nombre dice: ¡Soy un animal!<br>";
    }

    public function set_nombre($nombre) {
        if (strlen($nombre) > 21) {
            echo "Error: El nombre debe ser una cadena de caracteres con un máximo de 21 caracteres.<br>";
            return false;
        }
        $this->nombre = $nombre;
        return true;
    }
}
?>
