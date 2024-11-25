<?php
/*
$servername = "localhost";
$database = "empresa";
$username = "root";
$password = "";

// Crear la conexión
$conexion = mysqli_connect($servername, $username, $password, $database);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Consulta SQL para obtener los usuarios
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conexion, $sql);

// Verificar si la consulta devuelve resultados
if (mysqli_num_rows($query) > 0) {
    // Recorrer los resultados y mostrarlos
    while ($row = mysqli_fetch_assoc($query)) {
        echo "Código: " . $row["codigo"] . ", Nombre: " . $row["nombre"] . ", Rol: " . $row["rol"] . "<br>";
    }
} else {
    echo "No hay registros";
}

// Cerrar la conexión
mysqli_close($conexion);

?>
*/

/*
namespace Lib;

use mysqli;

class DataBase {
    private mysqli $conexion;

    public function __construct(
        private string $servidor,
        private string $usuario,
        private string $password,
        private string $baseDatos
    ) {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->baseDatos);

        // Verificar conexión
        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }
    }

    // Método para ejecutar consultas SQL
    public function query(string $sql): bool|mysqli_result {
        return $this->conexion->query($sql);
    }

    // Método para cerrar la conexión
    public function close(): void {
        $this->conexion->close();
    }

    // Método para escapar datos
    public function escape(string $value): string {
        return $this->conexion->real_escape_string($value);
    }
}

?>
*/


$servername = "localhost";
$database = "empresa";
$username = "root";
$password = "";

try {
    // Configurar para lanzar excepciones en caso de errores de mysqli
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Crear la conexión
    $conexion = mysqli_connect($servername, $username, $password, $database);

    // Consulta SQL para obtener los usuarios
    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($conexion, $sql);

    // Verificar si la consulta devuelve resultados
    if (mysqli_num_rows($query) > 0) {
        // Recorrer los resultados y mostrarlos
        while ($row = mysqli_fetch_assoc($query)) {
            echo "Código: " . $row["codigo"] . ", Nombre: " . $row["nombre"] . ", Rol: " . $row["rol"] . "<br>";
        }
    } else {
        echo "No hay registros";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
    
} catch (mysqli_sql_exception $e) {
    // Capturar cualquier error de SQL y mostrar un mensaje
    echo "Error en la conexión o en la consulta: " . $e->getMessage();
}

?>
