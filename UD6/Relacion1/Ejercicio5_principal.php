<?php
// Incluye las clases
require_once 'Ejercicio5_basecalc.php';
require_once 'Ejercicio5_derivadas.php';


// Ejemplo de uso
$num1 = 10;
$num2 = 5;

$addCalc = new AddCalc($num1, $num2);
echo "Suma: " . $addCalc->calculate() . "<br>";

$subCalc = new SubCalc($num1, $num2);
echo "Resta: " . $subCalc->calculate() . "<br>";

$mulCalc = new MulCalc($num1, $num2);
echo "Multiplicación: " . $mulCalc->calculate() . "<br>";

$divCalc = new DivCalc($num1, $num2);
echo "División: " . $divCalc->calculate() . "<br>";

// Ejemplo de división por cero
$divCalcZero = new DivCalc($num1, 0);
echo "División por cero: " . $divCalcZero->calculate() . "<br>";
?>
