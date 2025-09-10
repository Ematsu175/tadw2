<?php
require_once __DIR__ . '/validator_strategy.php';

class BrandValidator implements ValidatorStrategy {
    public function validate(array $data): array {
        if (!isset($data['codigo']) || !isset($data['nome'])) {
            return [false, "Faltan campos"];
        }
        if (!is_numeric($data['codigo'])) {
            return [false, "codigo debe ser numérico"];
        }
        if (trim($data['nome']) === "") {
            return [false, "nome no puede estar vacío"];
        }
        return [true, ""];
    }
}
