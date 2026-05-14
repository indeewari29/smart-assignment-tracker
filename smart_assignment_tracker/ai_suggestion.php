<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$stressLevel = $_GET['stress'] ?? 'low';
$daysUntil = $_GET['days'] ?? 999;

$command = '"C:\Program Files\swipl\bin\swipl.exe" -q -s C:\xampp\htdocs\smart_assignment_tracker\ai_rule.pl -g "get_suggestion(' . $stressLevel . ', ' . $daysUntil . ', Message), write(Message), halt." 2>&1';
$aiMessage = shell_exec($command);

$aiMessage = preg_replace('/[^\x20-\x7E\x0A\x0D]/', '', $aiMessage);

if (empty($aiMessage)) {
    $aiMessage = "Take a breath. One small step is enough for today.";
}

include 'templates/ai_suggestions.php';
