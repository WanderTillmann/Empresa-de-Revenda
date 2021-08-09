<?php

namespace App\Rules;

use App\Services\CepServices;
use Illuminate\Contracts\Validation\Rule;

class CepRule implements Rule
{
    public $cepService;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(CepServices $cepService)
    {
        $this->cepService = $cepService;
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
        return $this->cepService->ValidarCep($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O CEP passado é inválido.';
    }
}
