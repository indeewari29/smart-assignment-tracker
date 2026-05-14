<?php
require_once 'classes/UserRepository.php';
require_once 'classes/AssignmentRepository.php';
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() != 'admin') {
    header("Location: login.php");
    exit();
}

$userRepo = new UserRepository();
$assignmentRepo = new AssignmentRepository();

$users = $userRepo->getAllUsers();
$assignments = $assignmentRepo->getAll();

include 'templates/admin_view.php';
