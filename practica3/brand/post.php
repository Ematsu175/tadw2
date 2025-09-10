<?php
header("Content-Type: application/json; charset=utf-8");
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../v1/repositories/repository.php';

// Leer datos del body JSON
$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['codigo'], $input['nome'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos: codigo, nome"]);
    exit;
}

$repo = new BrandRepository();

if ($repo->exists((int)$input['codigo'])) {
    http_response_code(409); // conflicto
    echo json_encode(["error" => "La marca ya existe"]);
    exit;
}

$ok = $repo->insert((int)$input['codigo'], $input['nome']);
echo json_encode(["success" => $ok]);
