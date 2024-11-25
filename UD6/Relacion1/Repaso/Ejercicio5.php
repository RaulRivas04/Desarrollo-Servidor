<?php
require_once 'Ejercicio1.php';

class EmpleadoConstante extends EmpleadoConstructor8 {
    private const SUELDO_TOPE = 3333;

    public function debePagarImpuestos(): bool {
        return $this->sueldo > self::SUELDO_TOPE;
    }
}
?>
