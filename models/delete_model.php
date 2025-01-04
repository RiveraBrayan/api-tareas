<?php
require_once './config/database.php';

class Delete_model {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function deleteTask($id) {
        // Consulta SQL para eliminar la tarea por su ID
        $query = "DELETE FROM tasks WHERE id_task = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Verificamos si alguna fila fue eliminada
            if ($stmt->rowCount() > 0) {
                return true;  // Tarea eliminada correctamente
            } else {
                return false; // No se encontró la tarea para eliminar
            }
        } else {
            return false; // Error en la ejecución de la consulta
        }
    }
}