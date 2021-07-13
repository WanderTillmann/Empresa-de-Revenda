<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovimentoEstoqueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'produto_id' => 'required',
            'quantidade' => 'required|numeric',
            'valor' => 'required|numeric',
            'empresa_id' => 'required',
            'tipo' => ['required', Rule::in(['entrada', 'saida'])],
        ];
    }

    /**
     * Limpa os campos com mascara
     *
     * @return void
     */
    public function validationData()
    {
        $campos = $this->all();

        $campos['valor'] = numero_iso($campos['valor']);
        $campos['quantidade'] = numero_iso($campos['quantidade']);

        $this->replace($campos);
        return  $campos;
    }
}
