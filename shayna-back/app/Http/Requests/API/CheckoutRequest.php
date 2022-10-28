<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telpon' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'total' => 'required|integer',
            'status' => 'required|string|in:PENDING,FAILED,SUCCESS',
            'transaction_details' => 'required|array',
            'transaction_details.*' => 'integer|exists:products,id'
        ];
    }
}
