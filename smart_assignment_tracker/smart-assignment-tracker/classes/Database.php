<?php
class Database
{
    private static $conn = null;

    public static function conn()
    {
        if (self::$conn == null) {
            self::$conn = mysqli_connect(
                "localhost",
                "root",
                "",
                "smart_assignment_tracker"
            );
        }
        return self::$conn;
    }
}
