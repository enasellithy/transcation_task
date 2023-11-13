<?php

namespace App\Http\Requests\Admin\SubCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditSubCategoryRequest extends FormRequest
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
                Rule::unique('sub_categories')->ignore($this->sub_category),
            ],
            'category_id' => [
                'required',
                'numeric',
                'exists:categories,id'
            ],
        ];
    }
}
