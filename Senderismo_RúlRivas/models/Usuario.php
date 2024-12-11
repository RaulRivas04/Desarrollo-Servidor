<?php
class Usuario {
    public $id;
    public $nombre;
    public $email;
    public $password;
    public $rol;

    public function __construct($id, $nombre, $email, $password, $rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }
}
