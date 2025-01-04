<?php
class Database {
    private $conn;

    public function getConnection() {
        $this->conn = null;

        // Database configuration
        $config = include('./config.php');

        try {
            // Using TCP/IP for remote connections
            $this->conn = new PDO(
                "mysql:host=" . $config['host'] . ";port=3306;dbname=" . $config['db_name'],
                $config['username'],
                $config['password']
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}