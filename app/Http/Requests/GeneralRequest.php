<?php

namespace App\Http\Requests;

use App\Rules\FloatNumber;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {

        // Define Rules array
        $rules = ['required', 'numeric', new FloatNumber];

        return [
            "firstNumber" => $rules,

            "secondNumber" => $rules,
        ];
    }
}
