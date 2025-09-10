<?php
class BrandRepository {
    private mysqli $db;

    public function __construct() {
        $this->db = Database::getInstance(); // usa Singleton
    }

    public function upsert(int $id, string $name, string $type = null): bool {
    $sql = "INSERT INTO marca (codigo, nome) VALUES (?,?)
            ON DUPLICATE KEY UPDATE nome = VALUES(nome)";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("is", $id, $name);
    return $stmt->execute();
}

    public function listByType(string $type): array {
        $stmt = $this->db->prepare("SELECT * FROM marca WHERE type=? ORDER BY nome");
        $stmt->bind_param("s", $type);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
