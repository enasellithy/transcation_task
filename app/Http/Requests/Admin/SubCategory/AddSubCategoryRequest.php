<?php

namespace App\Http\Requests\Admin\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class AddSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:100',
                'unique:sub_categories'
            ],
            'category_id' => [
                'required',
                'numeric',
                'exists:categories,id'
            ],
        ];
    }
}
