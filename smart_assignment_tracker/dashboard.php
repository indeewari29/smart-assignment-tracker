<?php
require_once 'classes/AssignmentRepository.php';
require_once 'classes/User.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

if ($user->getRole() == 'admin') {
    header("Location: admin.php");
    exit();
}
$repo = new AssignmentRepository();
$assignments = $repo->getByUser($user->getId());

include 'templates/dashboard_view.php';
