<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLienHeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_khach_hang' => 'required|max:255',
            'email_khach_hang' => 'required|email',
            'chu_de' => 'max:255',
            'noi_dung' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_khach_hang.required' => 'Tên không được để trống.',
            'ten_khach_hang.max' => 'Tên không được vượt quá 255 ký tự.',
            'email_khach_hang.required' => 'Email không được để trống.',
            'email_khach_hang.email' => 'Không đúng định dạng email.',
            'chu_de.max' => 'Chủ đề không được vượt quá 255 ký tự.',
            'noi_dung.required' => 'Nội dung không được để trống.',
        ];
    }
}
