<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\InvokableRule;

class TimeBetween implements InvokableRule
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
        //
        $startTime = Carbon::createFromTimeString('18:00:00');
        // $startTime = Carbon::parse('9:00:00');
        $endTime = Carbon::createFromTimeString('23:00:00');
        $inputDate = Carbon::parse($value);
        $inputTime = Carbon::createFromTime($inputDate->hour,$inputDate->minute,$inputDate->second);
        if ($inputTime < $startTime || $inputTime > $endTime) {
            $fail('The reservation time must be within 6PM to 11PM.');
        }
        // $startTime =Carbon::createFromTime('9', '00','00', 'AM');

        // dd($inputTime->toArray());
    }
}
