<?php
header("Content-Type: application/json"); // Set response content type to JSON

// Handle CORS (optional if you're serving the API from another domain)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Handle GET request (e.g., return data)
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            echo json_encode(["status" => "success", "message" => "GET method called for ID $id"]);
        } else {
            echo json_encode(["status" => "success", "message" => "GET method called for all records"]);
        }
        break;

    case 'POST':
        // Handle POST request (e.g., create a new record)
        $input = json_decode(file_get_contents('php://input'), true); // Get POST data as JSON
        if (isset($input['name'])) {
            $name = $input['name'];
            echo json_encode(["status" => "success", "message" => "POST method called, name: $name"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Name not provided"]);
        }
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Method not allowed"]);
        break;
}
?>
