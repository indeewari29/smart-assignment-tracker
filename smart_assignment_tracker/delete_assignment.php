<?php
require_once 'classes/AssignmentRepository.php';
require_once 'classes/Assignment.php';
require_once 'classes/User.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user']->getId();
$repo = new AssignmentRepository();
$assignments = $repo->getByUser($userId);

$message = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['assignment_id'];

    $assignment = $repo->getById($id);
    if ($assignment && $assignment->getUserId() == $userId) {
        $repo->delete($id);
        $message = "Assignment deleted!";

        $assignments = $repo->getByUser($userId);
    } else {
        $error = "Cannot delete this assignment";
    }
}

include 'templates/delete_assignment_form.php';
