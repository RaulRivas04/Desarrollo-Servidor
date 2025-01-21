<?php
namespace Models;

class User
{
    //PROPIEDADES
    protected static array $errores = [];
    private ?int $id;
    private string $name;
    private string $lastname;
    private string $email;
    private string $password;
    private string $role;

    //CONSTRUCTOR
    public function __construct(?int $id, string $name, string $lastname, string $email, string $password, string $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    //GETTERS
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    //SETTERS
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    //METODOS
    public static function getErrores(): array
    {
        return self::$errores;
    }
    public static function setErrores(array $errores): void
    {
        self::$errores = $errores;
    }
    public function validar(): bool
    {
        self::$errores = [];
        if(empty($this->name))
        {
            self::$errores[] = 'El nombre es obligatorio';
        }
        //realizar todas las validaciones posibles de las propiedades
        return empty(self::$errores);
    }
    public function sanear(): void
    {
        $this->name = filter_var($this->name, );
        //realizar el saneamiento de las demas propiedades
    }
    public static function fromArray(array $data): User
    {
        return new User(
            id: $data['id'] ?? null,
            name: $data['name'],
            lastname: $data['lastname'],
            email: $data['email'],
            password: $data['password'],
            role: $data['role']
        );
    }
}