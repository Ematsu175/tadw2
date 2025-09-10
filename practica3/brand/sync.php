<?php
header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../v1/services/service.php';
require_once __DIR__ . '/../v1/repositories/repository.php';
require_once __DIR__ . '/../v1/validators/validator.php';

$type = "carros"; // fijo a carros

$service = new FipeService();
$result  = $service->fetchBrands($type);

if ($result['error']) {
    http_response_code(500);
    echo json_encode([
        "error" => $result['error'],
        "url"   => FIPE_BASE . "/$type/marcas"
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$data = $result['data'];

$repo = new BrandRepository();
$validator = new BrandValidator();

$inserted = 0;
$skipped  = 0;
$errors   = [];

foreach ($data as $row) {
    [$ok, $msg] = $validator->validate($row);
    if ($ok) {
        $id   = (int)$row['codigo'];
        $name = $row['nome'];
        if ($repo->insert($id, $name)) {
            $inserted++;
        }
    } else {
        $skipped++;
        $errors[] = $msg;
    }
}

echo json_encode([
    "status"   => "OK",
    "inserted" => $inserted,
    "skipped"  => $skipped,
    "errors"   => $errors
], JSON_UNESCAPED_UNICODE);
