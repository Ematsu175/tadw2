<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");

require_once '../db.php';

// Leer datos JSON del cuerpo
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Validación de datos recibidos
if (!isset($data['first_name']) || !isset($data['last_name'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan campos: first_name o last_name"]);
    exit;
}

$first_name = $data['first_name'];
$last_name = $data['last_name'];

// Insertar en base de datos
$conn = connectDB();
$sql = "INSERT INTO actor (first_name, last_name, last_update) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $first_name, $last_name);
$stmt->execute();

// Respuesta
echo json_encode(["message" => "Actor creado exitosamente"]);
