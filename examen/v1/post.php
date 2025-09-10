<?php
require_once 'repository.php';
require_once 'validator_context.php';

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
$repo = new Repository();
$repo->getAll($data["lenght"], $data["opts"]);

echo json_encode(["message" => "Actor creado exitosamente"]);

