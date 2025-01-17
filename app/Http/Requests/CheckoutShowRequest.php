<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutShowRequest extends FormRequest
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
            'checkout' => 'required|exists:checkouts,id,user_id,'.$this->user()->id
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'checkout' => $this->route('checkout')
        ]);
    }
}
