<?php
require_once 'classes/AssignmentRepository.php';
require_once 'classes/UserRepository.php';

$userRepo = new UserRepository();
$assignmentRepo = new AssignmentRepository();

$users = $userRepo->getAllUsers();

foreach ($users as $user) {
    $assignments = $assignmentRepo->getByUser($user->getId());
    $today = new DateTime();

    foreach ($assignments as $a) {
        $deadline = new DateTime($a->getDeadline());
        $diff = $today->diff($deadline)->days;

        if ($deadline >= $today && $diff <= 3) {
            $to = $user->getEmail();
            $subject = "🚩 Assignment deadline approaching";
            $message = "Hello " . $user->getName() . ",\n\n";
            $message .= "Your assignment '" . $a->getTitle() . "' is due in " . $diff . " days.\n";
            $message .= "Subject: " . $a->getSubject() . "\n";
            $message .= "Priority: " . $a->getPriority() . "\n\n";
            $message .= "Log in to your dashboard to track your progress.\n\n";
            $message .= "Smart Assignment & Deadline Tracker";

            $headers = "From: noreply@assignment-tracker.com\r\n";
            mail($to, $subject, $message, $headers);
        }
    }
}

echo "Deadline check completed";
