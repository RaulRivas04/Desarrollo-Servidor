<?php 
namespace DBTienda;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null; // Conexión única a la base de datos

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                // Configuración de conexión a la base de datos
                $host = $_ENV['DB_SERVERNAME'] ?? 'localhost';
                $db = $_ENV['DB_DATABASE'] ?? 'tienda';
                $user = $_ENV['DB_USERNAME'] ?? 'root';
                $pass = $_ENV['DB_PASSWORD'] ?? '';
                $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';
                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

                // Inicialización de la conexión PDO
                self::$connection = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Modo de errores en excepciones
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Formato de resultados
                ]);
            } catch (PDOException $e) {
                // Manejo de errores de conexión
                throw new PDOException('Error de conexión a la base de datos: ' . $e->getMessage());
            }
        }

        return self::$connection; // Retorna la conexión
    }
}
?>
