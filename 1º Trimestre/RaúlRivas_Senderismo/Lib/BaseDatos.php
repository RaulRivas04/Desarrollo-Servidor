<?php

namespace Lib;

use PDO;
use PDOException;
use PDOStatement;

class BaseDatos {
    private PDO $conexion;
    private mixed $resultado;

    public function __construct(
        private string $servidor = SERVERNAME,
        private string $usuario = USERNAME,
        private string $pass = PASSWORD,
        private string $base_datos = DATABASE
    ) {
        $this->conexion = $this->conectar();
    }

    // Establece la conexión con la base de datos
    private function conectar(): PDO {
        try {
            $opciones = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                PDO::MYSQL_ATTR_FOUND_ROWS => true
            ];
            return new PDO(
                "mysql:host={$this->servidor};dbname={$this->base_datos}",
                $this->usuario,
                $this->pass,
                $opciones
            );
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al conectar a la base de datos: " . $e->getMessage();
            exit;
        }
    }

    // Prepara una consulta SQL
    public function prepare(string $consultaSQL): PDOStatement {
        return $this->conexion->prepare($consultaSQL);
    }

    // Ejecuta una consulta sin parámetros
    public function consulta(string $consultaSQL): void {
        $this->resultado = $this->conexion->query($consultaSQL);
    }

    // Extrae un solo registro de los resultados
    public function extraer_registro(): mixed {
        return $this->resultado->fetch(PDO::FETCH_ASSOC) ?: false;
    }

    // Extrae todos los registros de los resultados
    public function extraer_todos(): array {
        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
