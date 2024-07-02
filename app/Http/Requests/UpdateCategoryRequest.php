<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'slug'=>"required|max:190|unique:categories,slug,".$this->id,
            'title'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ];
    }
}
