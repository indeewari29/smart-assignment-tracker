<?php
require_once 'classes/User.php';
require_once 'classes/MoodRepository.php';
require_once 'classes/AssignmentRepository.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$error = "";
$success = "";
$ai_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $q1 = $_POST['q1'] ?? '';
    $q2 = $_POST['q2'] ?? '';
    $q3 = $_POST['q3'] ?? '';

    $score = 0;

    if ($q1 == 'heavy') $score += 2;
    elseif ($q1 == 'tense') $score += 1;

    if ($q2 == 'exhausted') $score += 2;
    elseif ($q2 == 'tired') $score += 1;

    if ($q3 == 'overwhelmed') $score += 2;
    elseif ($q3 == 'busy') $score += 1;

    if ($score >= 4) {
        $stressLevel = 'high';
    } elseif ($score >= 2) {
        $stressLevel = 'medium';
    } else {
        $stressLevel = 'low';
    }

    $userId = $_SESSION['user']->getId();

    $repo = new MoodRepository();
    $result = $repo->save($userId, $stressLevel);

    if ($result) {

        $assignmentRepo = new AssignmentRepository();
        $assignments = $assignmentRepo->getByUser($userId);

        $daysUntil = null;
        foreach ($assignments as $a) {
            $deadline = $a->getDeadline();
            if ($deadline >= date('Y-m-d')) {
                $days = (strtotime($deadline) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
                if ($daysUntil === null || $days < $daysUntil) {
                    $daysUntil = $days;
                }
            }
        }

        header("Location: ai_suggestion.php?stress=" . $stressLevel . "&days=" . ($daysUntil ?? 999) . "&t=" . time());
        exit();
    } else {
        $error = "Something went wrong. Please try again.";
    }
}

include 'templates/mood_form.php';
