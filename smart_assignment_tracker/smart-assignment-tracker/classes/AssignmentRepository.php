<?php
require_once 'Database.php';
require_once 'Assignment.php';

class AssignmentRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conn();
    }

    public function getByUser($userId)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT*FROM assignments WHERE user_id=?");
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $assignments = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $assignments[] = new Assignment(
                $row['assignment_id'],
                $row['title'],
                $row['subject'],
                $row['deadline'],
                $row['priority'],
                $row['user_id']
            );
        }
        return $assignments;
    }

    public function getAll()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM assignments");
        $assignments = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $assignments[] = new Assignment(
                $row['assignment_id'],
                $row['title'],
                $row['subject'],
                $row['deadline'],
                $row['priority'],
                $row['user_id']
            );
        }
        return $assignments;
    }

    public function getById($id)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM assignments WHERE assignment_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return new Assignment(
                $row['assignment_id'],
                $row['title'],
                $row['subject'],
                $row['deadline'],
                $row['priority'],
                $row['user_id']
            );
        }
        return null;
    }

    public function save($title, $subject, $deadline, $priority, $userId)
    {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO assignments (title, subject, deadline, priority, user_id) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssi", $title, $subject, $deadline, $priority, $userId);
        return mysqli_stmt_execute($stmt);
    }

    public function delete($id)
    {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM assignments WHERE assignment_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }

    public function update($id, $title, $subject, $deadline, $priority)
    {
        $stmt = mysqli_prepare($this->conn, "UPDATE assignments SET title=?, subject=?, deadline=?, priority=? WHERE assignment_id=?");
        mysqli_stmt_bind_param($stmt, "ssssi", $title, $subject, $deadline, $priority, $id);
        return mysqli_stmt_execute($stmt);
    }
}
