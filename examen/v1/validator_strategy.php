<?php

interface ValidatorStrategy {
    public function validate(array $data): array;
}

class CreatePassValidator implements ValidatorStrategy {
    public function validate(array $data): array {
        if (empty($data['length']) || empty($data['opts'])) {
            return ["error" => "Faltan campos"];
        }
        return [];
    }
}

class UpdateActorValidator implements ValidatorStrategy {
    public function validate(array $data): array {
        if (empty($data['length']) || empty($data['opts']) ) {
            return ["error" => "Faltan campos"];
        }
        return [];
    }
}

