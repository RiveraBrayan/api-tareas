<?php
require_once './models/put_model.php';

class Put_controller {
    public function updateTask($id) {
        // Obtener los datos de la solicitud
        $data = json_decode(file_get_contents("php://input"));

        // Verificamos si los datos necesarios están presentes
        if (!empty($data->title) && !empty($data->description) && isset($data->status)) {
            $model = new Put_model();
            $task = $model->updateTask($id, $data->title, $data->description, $data->status);

            if ($task) {
                http_response_code(200);
                echo json_encode($task);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Failed to update task."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Incomplete Data."]);
        }
    }
}