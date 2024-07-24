<?php

namespace App\Validation;

class BukuValidation
{
    public function positive(string $num): bool
    {
        $num = (int) $num;
        return ($num >= 0) ? true : false;
    }
}
