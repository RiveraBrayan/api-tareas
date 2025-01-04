<?php

// API headers configuration
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Get HTTP method
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$resource = isset($request[1]) ? $request[1] : null;
$id = isset($request[2]) ? $request[2] : null; // Optional ID in the URL

// Load configuration and routes
require_once './config/database.php';
require_once './routes/routes.php';

// Call the routes file to process the request
handleRoutes($method, $resource, $id);