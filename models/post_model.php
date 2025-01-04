<?php
require_once './config/database.php';

class Post_model {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function createTask($title, $description, $status) {
        $query = "INSERT INTO tasks (title_task, description_task, status_task) VALUES (:title, :description, :status)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);

        if ($stmt->execute()) {
            return [
                "title_task" => $title,
                "description_task" => $description,
                "status_task" => $status
            ];
        } else {
            return false;
        }
    }
}