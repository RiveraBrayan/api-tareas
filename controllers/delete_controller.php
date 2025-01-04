<?php
require_once './models/delete_model.php';

class Delete_controller {
    public function deleteTask($id) {
        $model = new Delete_model();
        $task = $model->deleteTask($id);

        if ($task) {
            http_response_code(200);
            echo json_encode(["message" => "Task deleted successfully."]);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Task not found."]);
        }
    }
}