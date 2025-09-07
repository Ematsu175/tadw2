<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$mysqli = new mysqli('localhost', 'apiuser', '1234', 'sakila');

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM actor LIMIT 1");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "Error en la consulta: " . $mysqli->error;
}

