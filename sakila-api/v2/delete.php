<?php
require_once 'ActorRepository.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['actor_id'])) {
    http_response_code(400);
    echo json_encode(["error" => "actor_id es requerido"]);
    exit;
}

// Eliminar actor
$repo = new ActorRepository();
$repo->delete($data['actor_id']);

echo json_encode(["message" => "Actor eliminado"]);

