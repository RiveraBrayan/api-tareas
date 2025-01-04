<?php
require_once './controllers/get_controller.php';
require_once './controllers/post_controller.php';
require_once './controllers/put_controller.php';
require_once './controllers/delete_controller.php';

// Handle routes based on the HTTP method
function handleRoutes($method, $resource, $id = null) {
    if ($method === 'GET') {
        if ($resource == 'getAllTasks') {
            $get_controller = new Get_controller();
            $get_controller->getAll();
        } else if ($resource == 'getTaskbyID') {
            $get_controller = new Get_controller();
            $get_controller->getTaskbyID($id);
        } else {
            http_response_code(404); // Not found
            echo json_encode(["message" => "Route not found."]);
        }
    } else if ($method === 'POST') {
        if ($resource == 'create') {
            $post_controller = new Post_controller();
            $post_controller->createTask();
        } else {
            http_response_code(404); // Route not found
            echo json_encode(["message" => "Route not found for POST method."]);
        }
    } else if ($method === 'PUT') {
        if ($resource == 'update' && $id) {
            $put_controller = new Put_controller();
            $put_controller->updateTask($id);
        } else {
            http_response_code(404); // Route not found
            echo json_encode(["message" => "Route not found for PUT method."]);
        }
    } else if ($method === 'DELETE') {
        if ($resource == 'delete' && $id) {
            $delete_controller = new Delete_controller();
            $delete_controller->deleteTask($id);
        } else {
            http_response_code(404); // Route not found
            echo json_encode(["message" => "Route not found for DELETE method."]);
        }
    } else {
        http_response_code(405); // Method not allowed
        echo json_encode(["message" => "Method not allowed."]);
    }
}