<?php
// Estructura de Proyecto Senderismo Completo

// 1. CONFIGURACION: database.php
class Database {
    private static $host = 'localhost';
    private static $db_name = 'senderismo';
    private static $username = 'root';
    private static $password = '';
    private static $conn;

    public static function connect() {
        if (self::$conn == null) {
            self::$conn = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$db_name,
                self::$username,
                self::$password
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
}