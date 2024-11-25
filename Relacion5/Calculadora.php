<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora en PHP</title>
</head>
<body>

    <h1>Calculadora Simple</h1>

     <form method="POST">
        <label for="numero1">Número 1:</label>
        <input type="number" step="any" name="numero1" id="numero1" required>
        <br><br>
        
        <label for="numero2">Número 2:</label>
        <input type="number" step="any" name="numero2" id="numero2" required>
        <br><br>

         <button type="submit" name="operacion" value="sumar">Sumar</button>
        <button type="submit" name="operacion" value="restar">Restar</button>
        <button type="submit" name="operacion" value="multiplicar">Multiplicar</button>
        <button type="submit" name="operacion" value="dividir">Dividir</button>
    </form>

    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operacion = $_POST['operacion'];
        $resultado = '';

         switch ($operacion) {
            case 'sumar':
                $resultado = $numero1 + $numero2;
                break;
            case 'restar':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicar':
                $resultado = $numero1 * $numero2;
                break;
            case 'dividir':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = 'Error: División por cero';
                }
                break;
            default:
                $resultado = 'Operación no válida';
                break;
        }

         echo "<h2>Resultado: $resultado</h2>";
    }
    ?>

</body>
</html>