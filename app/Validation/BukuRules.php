<?php

namespace App\Validation;

class BukuRules
{
    public function positive(string $num): bool
    {
        $num = (int) $num;
        return ($num >= 0) ? true : false;
    }
}
