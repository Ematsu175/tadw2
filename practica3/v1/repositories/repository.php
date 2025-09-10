<?php
class BrandRepository {
    private mysqli $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Crear nueva marca
    public function insert(int $id, string $name): bool {
        $sql = "INSERT INTO marca (codigo, nome) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("is", $id, $name);
        return $stmt->execute();
    }

    // Actualizar marca existente
    public function update(int $id, string $name): bool {
        $sql = "UPDATE marca SET nome = ? WHERE codigo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("si", $name, $id);
        return $stmt->execute();
    }

    // Eliminar marca
    public function delete(int $id): bool {
        $sql = "DELETE FROM marca WHERE codigo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Obtener todas las marcas
    public function listAll(): array {
        $sql = "SELECT codigo, nome FROM marca ORDER BY nome";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Verificar si existe
    public function exists(int $id): bool {
        $sql = "SELECT 1 FROM marca WHERE codigo = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
}
