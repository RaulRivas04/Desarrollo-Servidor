<?php
class Database {
    private static $host = '127.0.0.1';
    private static $db_name = 'senderismo';
    private static $username = 'root';
    private static $password = '';
    private static $conn;

    public static function connect() {
        if (!self::$conn) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
