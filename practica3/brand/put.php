<?php
header("Content-Type: application/json; charset=utf-8");
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../v1/repositories/repository.php';

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['codigo'], $input['nome'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos: codigo, nome"]);
    exit;
}

$repo = new BrandRepository();

if (!$repo->exists((int)$input['codigo'])) {
    http_response_code(404);
    echo json_encode(["error" => "Marca no encontrada"]);
    exit;
}

$ok = $repo->update((int)$input['codigo'], $input['nome']);
echo json_encode(["success" => $ok]);
