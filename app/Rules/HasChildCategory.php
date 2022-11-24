<?php

namespace App\Rules;

use App\Models\Categories;
use Illuminate\Contracts\Validation\InvokableRule;

class HasChildCategory implements InvokableRule
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
        $child = Categories::where('parent_id', $value)->get();

        if (count($child) > 0) {
            $fail("Can't delete, Item has child elements!");
        }
    }
}
