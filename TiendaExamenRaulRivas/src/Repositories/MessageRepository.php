<?php
namespace Repositories;

use Lib\BaseDatos;
use PDO;

class MessageRepository
{
    private BaseDatos $db;

    public function __construct()
    {
        $this->db = new BaseDatos();
    }

    public function getAllMessages(): array
    {
        $sql = "SELECT * FROM messages";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}