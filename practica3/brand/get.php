<?php
header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../v1/repositories/repository.php';

$repo = new BrandRepository();

// Traer todas las marcas de la tabla
$data = $repo->listAll();

if (empty($data)) {
    echo json_encode(["message" => "No hay marcas registradas"], JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
