<?php
require_once 'ActorRepository.php';
require_once 'ValidatorContext.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

// Validación con Strategy
$validator = new ValidatorContext(new CreateActorValidator());
$errors = $validator->validate($data);

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode($errors);
    exit;
}

// Crear actor
$repo = new ActorRepository();
$repo->insert($data['first_name'], $data['last_name']);

echo json_encode(["message" => "Actor creado exitosamente"]);

