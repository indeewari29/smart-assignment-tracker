<?php
require_once 'classes/UserRepository.php';
require_once 'classes/User.php';
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRepo = new UserRepository();
    $user = $userRepo->findByEmail($email);

    if ($user && $password == $user->getPassword()) {
        $_SESSION['user'] = $user;

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password, please try again";
    }
}

include 'templates/login_form.php';
