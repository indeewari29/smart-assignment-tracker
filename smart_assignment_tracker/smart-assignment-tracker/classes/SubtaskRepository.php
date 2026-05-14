<?php
require_once 'Database.php';
require_once 'Subtask.php';

class SubtaskRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conn();
    }

    public function getByAssignment($assignmentId)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM subtask WHERE assignment_id = ? ORDER BY is_completed ASC, subtask_id ASC");
        mysqli_stmt_bind_param($stmt, "i", $assignmentId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $subtasks = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $subtasks[] = new Subtask(
                $row['subtask_id'],
                $row['name'],
                $row['time_limit'],
                $row['assignment_id'],
                $row['is_completed'] ?? 0
            );
        }
        return $subtasks;
    }

    public function save($assignmentId, $name, $timeLimit)
    {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO subtask (assignment_id, name, time_limit) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "iss", $assignmentId, $name, $timeLimit);
        return mysqli_stmt_execute($stmt);
    }

    public function delete($subtaskId)
    {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM subtask WHERE subtask_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $subtaskId);
        return mysqli_stmt_execute($stmt);
    }

    public function markComplete($subtaskId)
    {
        $stmt = mysqli_prepare($this->conn, "UPDATE subtask SET is_completed = 1 WHERE subtask_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $subtaskId);
        return mysqli_stmt_execute($stmt);
    }
}
