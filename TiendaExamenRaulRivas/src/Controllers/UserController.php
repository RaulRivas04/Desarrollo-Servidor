<?php
namespace Controllers;

use Lib\Pages;
use Models\User;
use Repositories\UserRepository;

class UserController
{
    private Pages $pages;

    public function __construct()
    {
        $this->pages = new Pages();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $user = new User(null, $name, $lastname, $email, $password, 'user');
            $userRepository = new UserRepository();
            $userRepository->save($user);

            // Redirect to login page or show a success message
            $this->pages->render('register_success');
            exit();
        } else {
            $this->pages->render('register');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $user = $userRepository->findByEmail($email);

            if ($user && password_verify($password, $user->getPassword())) {
                $_SESSION['user_id'] = $user->getId();
                header('Location: ' . BASE_URL . '/messages');
                exit();
            } else {
                echo "Invalid email or password";
            }
        } else {
            $this->pages->render('login');
        }
    }

    public function listMessages()
    {
        $messageRepository = new MessageRepository();
        $messages = $messageRepository->getAllMessages();
        $this->pages->render('messages', ['messages' => $messages]);
    }
}