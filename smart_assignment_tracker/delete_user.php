<?php
require_once 'classes/UserRepository.php';
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $repo = new UserRepository();
    $repo->deleteUser($_GET['id']);
}

header("Location: admin.php");
exit();
