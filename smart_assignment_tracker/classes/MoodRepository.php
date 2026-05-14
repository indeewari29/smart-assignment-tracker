<?php
require_once 'Database.php';

class MoodRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conn();
    }

    public function save($userId, $level)
    {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO stress (user_id, level, date) VALUES (?, ?, CURDATE())");
        mysqli_stmt_bind_param($stmt, "is", $userId, $level);
        return mysqli_stmt_execute($stmt);
    }

    public function getLatestByUser($userId)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM stress WHERE user_id = ? ORDER BY date DESC LIMIT 1");
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }
}
