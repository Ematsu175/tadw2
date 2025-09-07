<?php
require_once 'ActorRepository.php';

header('Content-Type: application/json');

$repo = new ActorRepository();
$actors = $repo->getAll(10);

echo json_encode($actors);

