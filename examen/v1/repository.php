<?php
///api/password?length=12&includeUppercase=true&includeLowercase=true&includeNumbers=true
require_once('GenPassword.php');

class Repository{
    public $length = 12;
    public $opts = [];


    public function getPassword(){  
        $this->length = $length;
        $this->$lower = true;
        $this->$upper = true;
        $this->$digit = true;
        $opts = [
            'lower' => $lower,
            'upper' => $upper,
            'digit' => $digit,
        ];
        $genPass = generate_password($length, $opts);
        return $genPass;
    }
}