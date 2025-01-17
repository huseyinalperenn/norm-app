<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'basket' => 'required|exists:baskets,id,user_id,'.$this->user()->id,
            'qty' => 'required|integer'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "basket" => $this->route('basket')
        ]);
    }
}
