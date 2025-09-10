<?php
require_once('repository.php');

header('Content-Type: application/json');

$repo =new Repository();
$pass = $repo->getPassword();

echo json_encode($pass);
