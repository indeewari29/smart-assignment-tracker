<?php
require_once 'classes/UserRepository.php';
session_start();

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'student';

    $userRepo = new UserRepository();

    $existingUser = $userRepo->findByEmail($email);

    if ($existingUser) {
        $error = "Email already registered!";
    } else {
        $result = $userRepo->save($name, $email, $password, 'student');
        if ($result) {
            $success = "Account created :) Please sign in";
        } else {
            $error = "Registration failed :( Please try again";
        }
    }
}

include 'templates/signup_form.php';
