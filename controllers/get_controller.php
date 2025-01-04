<?php

require_once './models/get_model.php';

class Get_controller {
    public function getAll() {
        $model = new Get_model();
        $tasks = $model->getAll();

        if ($tasks) {
            http_response_code(200);
            echo json_encode($tasks);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "No tasks found."]);
        }
    }

    public function getTaskbyID($id) {
        $model = new Get_model();
        $task = $model->getTaskbyID($id);

        if ($task) {
            http_response_code(200);
            echo json_encode($task);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Task not found."]);
        }
    }
}