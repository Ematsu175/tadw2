<?php

require_once 'validator_strategy.php';

class ValidatorContext {
    private $strategy;

    public function __construct(ValidatorStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function validate(array $data): array {
        return $this->strategy->validate($data);
    }
}

