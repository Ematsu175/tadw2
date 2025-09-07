<?php
require_once __DIR__ . '/../db.php';

class ActorRepository {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAll($limit = 10) {
        $sql = "SELECT * FROM actor LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($first_name, $last_name) {
        $sql = "INSERT INTO actor (first_name, last_name, last_update) VALUES (?, ?, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $first_name, $last_name);
        return $stmt->execute();
    }

    public function update($id, $first_name, $last_name) {
        $sql = "UPDATE actor SET first_name = ?, last_name = ?, last_update = NOW() WHERE actor_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $first_name, $last_name, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM actor WHERE actor_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
