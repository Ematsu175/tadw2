<?php
///api/password?length=12&includeUppercase=true&includeLowercase=true&includeNumbers=true
require_once('GenPassword.php');

class Repository{

    public function getPassword(){  
        $length = 16;
        $lower = true;
        $upper = true;
        $digit = true;
        $opts = [
            'lower' => $lower,
            'upper' => $upper,
            'digit' => $digit,
        ];
        $genPass = generate_password($length, $opts);
        return $genPass;
    }

    public function getAll($length, $opts, $lower, $upper, $digit){  
        $this->$length = $length;
        $opts = [
            'lower' => $this->$lower = $lower,
            'upper' => $this->$upper = $upper,
            'digit' => $this->$digit = $digit,
        ];
        $this->$opts = $opts;
        $genPass = generate_password($length, $opts);
        return $genPass;
    }
}