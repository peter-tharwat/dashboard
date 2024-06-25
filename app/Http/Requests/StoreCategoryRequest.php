<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('categories-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slug'=>"required|max:190|unique:categories,slug",
            
            'title_ar'=>"required|max:190",
            'description_ar'=>"nullable|max:10000",
            'meta_description_ar'=>"nullable|max:10000",

            'title_en'=>"required|max:190",
            'description_en'=>"nullable|max:10000",
            'meta_description_en'=>"nullable|max:10000",

        ];
    }
}
