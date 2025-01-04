<?php
require_once './config/database.php';

class Put_model {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function updateTask($id, $title, $description, $status) {
        $query = "UPDATE tasks SET title_task = :title, description_task = :description, status_task = :status WHERE id_task = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':id', $id);
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