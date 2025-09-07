<?php
require_once '../db.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['actor_id'];

$conn = connectDB();
$sql = "DELETE FROM actor WHERE actor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode(["message" => "Actor eliminado"]);

