<?php
require_once 'classes/User.php';
require_once 'classes/AssignmentRepository.php';
require_once 'classes/Assignment.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user']->getId();
$repo = new AssignmentRepository();
$assignments = $repo->getByUser($userId);

$selectedAssignment = null;
$error = "";
$success = "";

if (isset($_GET['id'])) {
    $selectedAssignment = $repo->getById($_GET['id']);
    if (!$selectedAssignment || $selectedAssignment->getUserId() != $userId) {
        $selectedAssignment = null;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['assignment_id'];
    $title = $_POST['title'];
    $subject = $_POST['subject'];
    $deadline = $_POST['deadline'];
    $priority = $_POST['priority'];

    $repo->update($id, $title, $subject, $deadline, $priority);
    $success = "Assignment updated !";

    $selectedAssignment = $repo->getById($id);
}

include 'templates/edit_assignment_form.php';
