<?php
class BaseCalc {
    protected $num1;
    protected $num2;

    public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function calculate() {
        return "Número 1: $this->num1, Número 2: $this->num2";
    }
}
?>
