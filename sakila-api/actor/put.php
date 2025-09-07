<?php
require_once '../db.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['actor_id'];
$first_name = $data['first_name'];
$last_name = $data['last_name'];

$conn = connectDB();
$sql = "UPDATE actor SET first_name = ?, last_name = ?, last_update = NOW() WHERE actor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $first_name, $last_name, $id);
$stmt->execute();

echo json_encode(["message" => "Actor actualizado"]);

