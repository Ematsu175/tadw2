<?php

interface ValidatorStrategy {
    public function validate(array $data): array;
}

class CreateActorValidator implements ValidatorStrategy {
    public function validate(array $data): array {
        if (empty($data['first_name']) || empty($data['last_name'])) {
            return ["error" => "Faltan campos: first_name o last_name"];
        }
        return [];
    }
}

class UpdateActorValidator implements ValidatorStrategy {
    public function validate(array $data): array {
        if (empty($data['actor_id']) || empty($data['first_name']) || empty($data['last_name'])) {
            return ["error" => "Faltan campos: actor_id, first_name o last_name"];
        }
        return [];
    }
}

