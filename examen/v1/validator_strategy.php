<?php

interface ValidatorStrategy {
    public function validate(array $data): array;
}
//$length, $opts, $lower, $upper, $digit
class CreatePassValidator implements ValidatorStrategy {
    public function validate(array $data): array {
        if (empty($data['length']) || empty($data['opts']) || empty($data['lower']) || empty($data['upper']) || empty($data['digit'])) {
            return ["error" => "Faltan campos"];
        }
        return [];
    }
}

class UpdateActorValidator implements ValidatorStrategy {
    public function validate(array $data): array {
        if (empty($data['length']) || empty($data['opts']) || empty($data['lower']) || empty($data['upper']) || empty($data['digit']) ) {
            return ["error" => "Faltan campos"];
        }
        return [];
    }
}

