<?php
namespace Services;

use Repositories\UserRepository;
use Models\User;
use Lib\BaseDatos;

class Userservices
{
    private UserRepository $userRepository;

    public function __construct(BaseDatos $db)
    {
        $this->userRepository = new UserRepository($db);
    }

    public function registerUser(User $user): void
    {
        $this->userRepository->registerUser($user);
    }
}
