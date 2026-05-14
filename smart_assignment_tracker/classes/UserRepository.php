<?php
require_once 'Database.php';
require_once 'User.php';

class UserRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conn();
    }

    public function save($name, $email, $password, $role)
    {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $role);
        return mysqli_stmt_execute($stmt);
    }

    public function findByEmail($email)
    {
        $stmt = mysqli_prepare($this->conn, "SELECT*FROM users WHERE email=?");

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            return new User(
                $row['user_id'],
                $row['name'],
                $row['email'],
                $row['role'],
                $row['password']
            );
        }
        return null;
    }

    public function getAllUsers()
    {
        $result = mysqli_query($this->conn, "SELECT*FROM users");
        $users = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = new User(
                $row['user_id'],
                $row['name'],
                $row['email'],
                $row['role'],
                $row['password']
            );
        }
        return $users;
    }

    public function deleteUser($userId)
    {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM users WHERE user_id=?");
        mysqli_stmt_bind_param($stmt, "i", $userId);
        return mysqli_stmt_execute($stmt);
    }
}
