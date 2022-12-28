<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\InvokableRule;

class DateBetween implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        date_default_timezone_set('Asia/Yangon');
        $current = Carbon::now();
        $end = Carbon::now()->addDays(5);
        $inputDate = Carbon::parse($value);
        if ($inputDate < $current || $inputDate > $end) {
            $fail('The reservation date must be within next five days.');
        }
    }
}
