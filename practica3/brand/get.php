<?php
header("Content-Type: application/json; charset=utf-8");
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../v1/repositories/repository.php';

$type = $_GET['type'] ?? 'carros';
$repo = new BrandRepository();

echo json_encode($repo->listByType($type), JSON_UNESCAPED_UNICODE);
