<?php
namespace Models;

class User {

    // Array para almacenar errores de validación
    protected static array $errores = [];

    /**
     * Constructor de la clase User
     *
     * @param int|null $id ID del usuario (opcional)
     * @param string $nombre Nombre del usuario
     * @param string $apellidos Apellidos del usuario
     * @param string $email Correo electrónico del usuario
     * @param string $password Contraseña del usuario
     * @param string $rol Rol del usuario (por ejemplo, 'admin' o 'user')
     */
    public function __construct(
        private ?int $id = null,
        private string $nombre = '',
        private string $apellidos = '',
        private string $email = '',
        private string $password = '',
        private string $rol = ''
    ) {}

    // Getters
    public function getId(): ?int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRol(): string {
        return $this->rol;
    }

    // Obtener errores de validación
    public static function getErrores(): array {
        return self::$errores;
    }

    // Método para obtener errores (útil para controladores)
    public function getErrors(): array {
        return self::$errores;
    }

    // Setters
    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellidos(string $apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function setRol(string $rol): void {
        $this->rol = $rol;
    }

    public static function setErrores(array $errores): void {
        self::$errores = $errores;
    }

    /**
     * Validar los datos del usuario
     *
     * @return bool True si los datos son válidos, False si hay errores
     */
    public function validar(): bool {
        self::$errores = [];

        if (empty($this->nombre)) {
            self::$errores[] = "El nombre es obligatorio.";
        }

        if (empty($this->email)) {
            self::$errores[] = "El correo electrónico es obligatorio.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errores[] = "El formato del correo electrónico no es válido.";
        }

        if (empty($this->password)) {
            self::$errores[] = "La contraseña es obligatoria.";
        }

        return empty(self::$errores);
    }

    /**
     * Sanitizar los datos del usuario
     */
    public function sanitize(): void {
        $this->nombre = htmlspecialchars($this->nombre);
        $this->apellidos = htmlspecialchars($this->apellidos);
        $this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
    }

    /**
     * Crear una instancia de User a partir de un array
     *
     * @param array $data Datos del usuario
     * @return User Instancia de la clase User
     */
    public static function fromArray(array $data): User {
        return new User(
            id: $data['id'] ?? null,
            nombre: $data['nombre'] ?? '',
            apellidos: $data['apellidos'] ?? '',
            email: $data['email'] ?? '',
            password: $data['password'] ?? '',
            rol: $data['rol'] ?? ''
        );
    }

    /**
     * Convertir el objeto User a un array
     *
     * @return array Datos del usuario en formato array
     */
    public function toArray(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'password' => $this->password,
            'rol' => $this->rol,
        ];
    }
}
?>
