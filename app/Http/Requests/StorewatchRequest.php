<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorewatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->role = 'manager') {
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
            'name' => ['string', 'required'],
            'price' => ['integer', 'required', 'min: 1'],
            'dícount' => ['decimal'],
            'storage' => ['integer', 'required', 'min: 0'],
            'brand_id' => ['required'],
            'category_id' => ['required'],
            'description' => ['string', 'required'],
            'gender' => ['string', 'required'],
            'img1' => ['required', 'image'],
            'img2' => [ 'image'],
            'img3' => [ 'image'],
        ];
    }
}
