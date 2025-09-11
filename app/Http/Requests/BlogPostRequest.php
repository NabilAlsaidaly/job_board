<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'author' => 'required|max:100',
            'body' => 'required',
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'حقل العنوان مطلوب.',
            'title.max' => 'يجب ألا يتجاوز العنوان 255 حرفًا.',
            'author.required' => 'حقل المؤلف مطلوب.',
            'author.max' => 'يجب ألا يتجاوز اسم المؤلف 100 حرف.',
            'body.required' => 'حقل المحتوى مطلوب.',
        ];
    }
}
