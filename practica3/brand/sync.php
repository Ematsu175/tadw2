<?php
header("Content-Type: application/json; charset=utf-8");

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../v1/services/service.php';
require_once __DIR__ . '/../v1/repositories/repository.php';
require_once __DIR__ . '/../v1/validators/validator.php';

$type = "carros";  // fijo a carros

$service = new FipeService();
$data = $service->fetchBrands($type);

if (empty($data)) {
    echo json_encode(["error" => "No se recibieron datos de FIPE", "url" => FIPE_BASE . "/$type/marcas"]);
    exit;
}

$repo = new BrandRepository();
$validator = new BrandValidator();

$inserted = 0;
foreach ($data as $row) {
    [$ok, $msg] = $validator->validate($row);
    if ($ok) {
        $id = (int)$row['codigo'];
        $name = $row['nome'];
        if ($repo->upsert($id, $name)) {
            $inserted++;
        }
    }
}

echo json_encode(["status" => "OK", "inserted" => $inserted]);