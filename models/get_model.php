<?php
require_once './config/database.php';

class Get_model {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM tasks";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $tasks = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $status = $row['status_task'] == 1 ? 'success' : 'incomplete';
                $tasks[] = [
                    "id" => $row['id_task'],
                    "title" => $row['title_task'],
                    "description" => $row['description_task'],
                    "status" => $status,
                ];
            }
            return $tasks;
        } else {
            return false;
        }
    }

    public function getTaskbyID($id){
        $query = "SELECT * FROM tasks WHERE id_task = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $task = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($task) {
                $status = $task['status'] == 1 ? 'success' : 'incomplete';
                return [
                    "id" => $task['id_task'],
                    "title" => $task['title_task'],
                    "description" => $task['description_task'],
                    "status" => $status,
                ];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}