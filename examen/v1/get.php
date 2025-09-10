<?php
require_once('repository.php');

header('Content-Type: application/json');

$repo = Repository();
$pass = $repo->getPass();

echo json_encode($pass);
