<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'ten_nguoi_nhan' => 'required|string|max:255',
            'so_dien_thoai_nguoi_nhan' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email_nguoi_nhan' => 'required|string|max:255',
            'dia_chi_nguoi_nhan' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ten_nguoi_nhan.required' => 'Tên người nhận là bắt buộc điền',
            'ten_nguoi_nhan.string' => 'Tên người nhận là một chuỗi',
            'ten_nguoi_nhan.max' => 'Tên người nhận không được quá 255 ký tự',

            'email_nguoi_nhan.required' => 'Email bắt buộc điền',
            'email_nguoi_nhan.max' => 'Email không được quá 255 ký tự',
            'email_nguoi_nhan.string' => 'Email là một chuỗi',

            'so_dien_thoai_nguoi_nhan.regex' => 'Số điện thoại nhập không đúng đúng dạng',
            'so_dien_thoai_nguoi_nhan.required' => 'Số điện thoại bắt buộc điền',
            'so_dien_thoai_nguoi_nhan.string' => 'Số điện thoại là một chuỗi',

            'dia_chi_nguoi_nhan.string' => 'Địa chỉ là một chuỗi',
            'dia_chi_nguoi_nhan.max' => 'Địa chỉ không được quá 255 ký tự',
            'dia_chi_nguoi_nhan.required' => 'Địa chỉ bắt buộc điền',
       
        ];
    }
}
