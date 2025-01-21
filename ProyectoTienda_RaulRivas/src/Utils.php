<?php

class Utils
{
    /**
     * Verifica si el usuario actual tiene permisos de administrador.
     *
     * @return bool Devuelve true si el usuario es administrador, false de lo contrario.
     */
    public static function isAdmin(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']['rol'] === 'admin';
    }

    /**
     * Verifica si el usuario está autenticado en el sistema.
     *
     * @return bool Devuelve true si el usuario ha iniciado sesión, false de lo contrario.
     */
    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }
}
