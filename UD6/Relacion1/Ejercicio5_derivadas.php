<?php
class AddCalc extends BaseCalc {
    public function calculate() {
        return $this->num1 + $this->num2;
    }
}

class SubCalc extends BaseCalc {
    public function calculate() {
        return $this->num1 - $this->num2;
    }
}

class MulCalc extends BaseCalc {
    public function calculate() {
        return $this->num1 * $this->num2;
    }
}

class DivCalc extends BaseCalc {
    public function calculate() {
        // Manejo de división por cero
        if ($this->num2 == 0) {
            return "Error: División por cero.";
        }
        return $this->num1 / $this->num2;
    }
}
?>
