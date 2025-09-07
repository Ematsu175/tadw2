<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../db.php';

$conn = connectDB();
$sql = "SELECT * FROM actor LIMIT 10";
$result = $conn->query($sql);

$actors = [];
while ($row = $result->fetch_assoc()) {
    $actors[] = $row;
}
header('Content-Type: application/json');
echo json_encode($actors);

