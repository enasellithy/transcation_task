<?php

namespace App\Http\Requests\Admin\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class AddTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'numeric',
                'exists:categories,id',
            ],
            'sub_category_id' => [
                'numeric',
                'exists:sub_categories,id',
            ],
            'amount' => [
                'required',
            ],
            'payer' => [
                'required',
                'min:3',
                'max:100',
            ],
            'due_on' => [
                'required',
                'date',
            ],
            'vat' => [
                'required',
            ],
            'vat_in_inclusive' => [
                'required',
                'between:yes,no'
            ],
        ];
    }
}
