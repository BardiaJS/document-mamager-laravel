<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PersianPhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/[^0-9+]/', $value)) {
            $fail("Phone must have numbers only!");
            return;
        }

        if (!preg_match('/^(?:\+98|98|0)?9\d{9}$/', $value)) {
            $fail("Invalid type of phone!");
        }

        if(str_contains($value , ' ')){
            $fail("You can't use 'space' in phone!");
        }

    }
}
