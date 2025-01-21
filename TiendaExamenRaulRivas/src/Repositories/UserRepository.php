<?php
namespace Repositories;

use Lib\BaseDatos;
use Models\User;
use PDO;

class UserRepository
{
    private BaseDatos $db;

    public function __construct()
    {
        $this->db = new BaseDatos();
    }

    public function save(User $user)
    {
        $sql = "INSERT INTO users (name, lastname, email, password, role) VALUES (:name, :lastname, :email, :password, :role)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':role', $user->getRole());
        $stmt->execute();
    }

    public function findByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data['id'], $data['name'], $data['lastname'], $data['email'], $data['password'], $data['role']);
        }

        return null;
    }
}