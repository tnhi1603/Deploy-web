<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
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
            //
            'province' => ['string', 'required'],
            'district' => ['string', 'required'],
            'ward' => ['string', 'required'],
            'phone_number' => ['string', 'required', 'max_length:11'],
            'address' => ['string', 'required'],
            'user_id' => ["required"],
        ];
    }
}
