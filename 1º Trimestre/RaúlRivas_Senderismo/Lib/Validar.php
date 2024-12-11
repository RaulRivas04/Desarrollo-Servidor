<?php

namespace Lib;

class Validar {

    // Elimina etiquetas HTML y espacios de una cadena
    public static function sanitizeString(string $input): string {
        return trim(strip_tags($input));
    }

    // Sanitiza un email eliminando caracteres no válidos
    public static function sanitizeEmail(string $email): string {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    // Sanitiza un número de teléfono, permitiendo caracteres válidos
    public static function sanitizePhone(string $phone): string {
        return preg_replace('/[^0-9+\-\(\) ]/', '', $phone);
    }

    // Sanitiza un número entero, eliminando caracteres no numéricos
    public static function sanitizeInt(string $input): int {
        return (int) preg_replace('/[^0-9-]/', '', $input);
    }

    // Sanitiza un número decimal, reemplazando comas por puntos y eliminando caracteres no válidos
    public static function sanitizeDouble(string $input): float {
        $cleaned = preg_replace('/[^0-9\.-]/', '', str_replace(',', '.', $input));
        return (float) $cleaned;
    }

    // Sanitiza una fecha permitiendo solo números y guiones
    public static function sanitizeDate(string $date): string {
        return preg_replace('/[^0-9\-]/', '', $date);
    }

    // Valida que una cadena no esté vacía y sea un string
    public static function validateString(string $input): bool {
        return !empty($input) && is_string($input);
    }

    // Valida que el correo tenga un formato válido
    public static function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Valida que el teléfono tenga el formato correcto (9 dígitos)
    public static function validatePhone(string $phone): bool {
        return preg_match('/^[0-9]{9}$/', $phone);
    }

    // Valida que la fecha esté en formato correcto (YYYY-MM-DD)
    public static function validateDate(string $date): bool {
        $dateArray = explode('-', $date);
        return count($dateArray) === 3 && checkdate((int) $dateArray[1], (int) $dateArray[2], (int) $dateArray[0]);
    }

    // Valida que el valor sea un entero
    public static function validateInt(string $input): bool {
        return filter_var($input, FILTER_VALIDATE_INT) !== false;
    }

    // Valida que el valor sea un número decimal
    public static function validateDouble(string $input): bool {
        return filter_var($input, FILTER_VALIDATE_FLOAT) !== false;
    }
}

?>
