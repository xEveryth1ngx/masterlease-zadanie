<?php

namespace App\Http\Requests\Api\Multiply;

use Illuminate\Foundation\Http\FormRequest;

class MultiplyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'size' => 'required|integer|min:1|max:100',
        ];
    }
}
