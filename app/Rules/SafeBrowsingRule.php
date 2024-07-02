<?php

namespace App\Rules;

use App\Services\SafeBrowsing\Actions\CheckSafeUrlAction;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SafeBrowsingRule implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /** @var CheckSafeUrlAction $checkSafeUrlAction */
        $checkSafeUrlAction = app(CheckSafeUrlAction::class);

        try {
            if (!$checkSafeUrlAction->run($value)) {
                $fail("The :attribute is not safe to visit.");
            }
        } catch (\Exception $e) {
            $fail("Could not check the :attribute for safety.");
        }
    }
}
