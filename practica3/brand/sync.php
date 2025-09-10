<?php
header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../v1/services/service.php';
require_once __DIR__ . '/../v1/repositories/repository.php';
require_once __DIR__ . '/../v1/validators/validator.php';

// tipo fijo: carros
$type = "carros";

// Servicio FIPE
$service = new FipeService();
$data = $service->fetchBrands($type);

// Repo y validador
$repo = new BrandRepository();
$validator = new BrandValidator();

$inserted = 0;
$skipped = 0;

foreach ($data as $row) {
    [$ok, $msg] = $validator->validate($row);
    if ($ok) {
        $id = (int)$row['codigo'];
        $name = $row['nome'];
        if ($repo->upsert($id, $name, $type)) {
            $inserted++;
        }
    } else {
        $skipped++;
    }
}

echo json_encode([
    "status" => "OK",
    "inserted" => $inserted,
    "skipped" => $skipped
], JSON_UNESCAPED_UNICODE);
