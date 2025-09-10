<?php
interface ValidatorStrategy {
    public function validate(array $data): array;
}
