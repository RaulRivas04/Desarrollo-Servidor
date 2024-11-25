<?php
// Paso 1: Crear un fichero de texto con varias líneas
$archivo = 'archivo.txt';
$contenido_inicial = "Línea 1\nLínea 2\nLínea 3\n";

// Abrir el archivo en modo escritura (w), si no existe, lo crea
$file = fopen($archivo, 'w');
fwrite($file, $contenido_inicial);
fclose($file);

// Paso 2: Leer su contenido con fgets() y mostrar el contenido
$file = fopen($archivo, 'r');
while (!feof($file)) {
    $linea = fgets($file);
    echo $linea . "<br>";
}
fclose($file);

// Paso 3: Escribir dentro del archivo un nuevo texto (modo escritura)
$file = fopen($archivo, 'w');  // El modo 'w' sobreescribe el contenido
$nuevo_texto = "Nuevo contenido en el archivo\n";
fwrite($file, $nuevo_texto);
fclose($file);

// Paso 4: Copiar el archivo en el mismo directorio con otro nombre
$copia = 'archivo_copia.txt';
copy($archivo, $copia);

// Paso 5: Renombrar el archivo original
$nuevo_nombre = 'archivo_renombrado.txt';
rename($archivo, $nuevo_nombre);

// Paso 6: Eliminar el archivo renombrado
unlink($nuevo_nombre);

echo "Proceso completado.";
?>
