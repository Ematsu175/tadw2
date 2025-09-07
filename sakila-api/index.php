<?php
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case '/actor' && $method == 'GET':
        require 'actor/get.php';
        break;
    case '/actor' && $method == 'POST':
        require 'actor/post.php';
        break;
    case '/actor' && $method == 'PUT':
        require 'actor/put.php';
        break;
    case '/actor' && $method == 'DELETE':
        require 'actor/delete.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Ruta no encontrada"]);
        break;
}

