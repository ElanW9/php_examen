<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidWord implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $wordListPath = base_path('english5letterwords.csv');

        if (!file_exists($wordListPath)) {
            return false;
        }

        $wordList = file($wordListPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        return in_array($value, $wordList);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not a valid word.';
    }
}
