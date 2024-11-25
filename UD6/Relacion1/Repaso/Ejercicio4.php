<?php
class Ejercicio4 {
    public function __construct(private string $nombre, private string $apellidos, private float $sueldo = 1000) {}

    public function getNombreCompleto(): string {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public function debePagarImpuestos(): bool {
        return $this->sueldo > 3333;
    }
}
?>
