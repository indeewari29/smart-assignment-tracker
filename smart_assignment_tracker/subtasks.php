<?php
require_once 'classes/AssignmentRepository.php';
require_once 'classes/SubtaskRepository.php';
require_once 'classes/User.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$assignmentId = $_GET['assignment_id'] ?? 0;
$userId = $_SESSION['user']->getId();

$assignmentRepo = new AssignmentRepository();
$assignment = $assignmentRepo->getById($assignmentId);

if (!$assignment || $assignment->getUserId() != $userId) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_subtask'])) {
    $name = $_POST['name'];
    $timeLimit = $_POST['time_limit'];
    $subtaskRepo = new SubtaskRepository();
    $subtaskRepo->save($assignmentId, $name, $timeLimit);
    header("Location: subtasks.php?assignment_id=" . $assignmentId);
    exit();
}

if (isset($_GET['delete'])) {
    $subtaskId = $_GET['delete'];
    $subtaskRepo = new SubtaskRepository();
    $subtaskRepo->delete($subtaskId);
    header("Location: subtasks.php?assignment_id=" . $assignmentId);
    exit();
}

if (isset($_GET['complete'])) {
    $subtaskId = $_GET['complete'];
    $subtaskRepo = new SubtaskRepository();
    $subtaskRepo->markComplete($subtaskId);
    header("Location: subtasks.php?assignment_id=" . $assignmentId);
    exit();
}

$subtaskRepo = new SubtaskRepository();
$subtasks = $subtaskRepo->getByAssignment($assignmentId);

include 'templates/subtasks_view.php';
