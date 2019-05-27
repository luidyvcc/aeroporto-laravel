<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Flight;

class CheckAvailableFlight implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $flight = Flight::with(['plane', 'reserves'])->find($value);

        $plane = $flight->plane;
        $reserves = $flight->reserves;

        $qtyPassengers = $plane->qty_passengers; //capacidade do avição
        $qtyReserves = $reserves->count(); // reservas feitas

        return $qtyPassengers > $qtyReserves;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Voo lotado.';
    }
}
