<?php

namespace Milano\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAllRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() == true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return string[]
     */
    public function rules()
    {
        return $rules = [
            'title' => 'nullable|min:3|max:250',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }

    /**
     * Translate request verification attributes.
     * @return array|string[]
     */
    public function attributes()
    {
        return [
            "title" => "عنوان مقاله",
            "category_id" => "دسته بندی ",
        ];
    }
}

