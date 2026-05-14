<?php
require_once 'classes/AssignmentRepository.php';
require_once 'classes/User.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $subject = $_POST['subject'];
    $deadline = $_POST['deadline'];
    $priority = $_POST['priority'];
    $userId = $_SESSION['user']->getId();

    $repo = new AssignmentRepository();
    $result = $repo->save($title, $subject, $deadline, $priority, $userId);

    if ($result) {
        $success = "Assignment added successfully!";
    } else {
        $error = "Failed to add assignment";
    }
}

include 'templates/add_assignment_form.php';
