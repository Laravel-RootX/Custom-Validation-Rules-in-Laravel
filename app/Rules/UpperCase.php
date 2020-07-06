<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UpperCase implements Rule
{

    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
        return strtoupper($value) === $value;
    }


    public function message()
    {
        return 'The :attribute must be uppercase.';
    }
}
