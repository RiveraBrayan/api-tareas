<?php
require_once './models/post_model.php';

class Post_controller {
    public function createTask() {
        // Get the data from the request
        $data = json_decode(file_get_contents("php://input"));

        // Check if the necessary data is present
        if (!empty($data->title) && !empty($data->description) && isset($data->status)) {
            $model = new Post_model();
            $task = $model->createTask($data->title, $data->description, $data->status);

            if ($task) {
                http_response_code(201); // Created successfully
                echo json_encode(["message" => "Task created successfully", "task" => $task]);
            } else {
                http_response_code(500); // Internal server error
                echo json_encode(["message" => "Error creating the task."]);
            }
        } else {
            http_response_code(400); // Bad request
            echo json_encode(["message" => "Incomplete data."]);
        }
    }
}