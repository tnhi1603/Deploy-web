<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoucherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->role == 'manager') {
            return true;
        }
        return false;
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
            'code' => ['required', 'string', 'max: 18'],
            'discount' => ['required'],
            'type' => ['required'],
            'start_date' => ['required'],
            'rule' => ['required'],
            'minimum' => ['required'],
            'end_date' => ['required'], 
        ];
    }
}
