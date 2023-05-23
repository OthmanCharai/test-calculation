<?php

namespace App\Http\Requests;

use App\Rules\FloatNumber;
use App\Rules\NotZero;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DivisionRequest extends FormRequest
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

            "secondNumber" => array_merge($rules, [new NotZero]),
        ];
    }
}
