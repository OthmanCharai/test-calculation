<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use Illuminate\Validation\Rule;

class FloatNumber implements ValidationRule
{
    /**
     * Regex validates that it is a float number with optional decimal places.
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //Regex validates that it is a float number with optional decimal places.
        if (!('regex:/^\d+(\.\d+)?$/')) {
            $fail("The number need to be a float");
        }

    }
}
