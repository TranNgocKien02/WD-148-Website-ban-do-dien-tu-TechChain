<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'tieu_de' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'anh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url|max:255',
            'ngay_bat_dau' => 'nullable|date',
            'ngay_ket_thuc' => 'nullable|date|after_or_equal:ngay_bat_dau',
        ];
    }

    public function messages(): array
    {
        return [
            'tieu_de.required' => 'Tiêu đề là bắt buộc.',
            'tieu_de.string' => 'Tiêu đề phải là một chuỗi ký tự.',
            'tieu_de.max' => 'Tiêu đề không được vượt quá 255 ký tự.',

            'mo_ta.string' => 'Mô tả phải là một chuỗi ký tự.',

            'anh.image' => 'Tệp tải lên phải là một hình ảnh.',
            'anh.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, hoặc svg.',
            'anh.max' => 'Dung lượng ảnh không được vượt quá 2MB.',

            'link.url' => 'Link phải là một URL hợp lệ.',
            'link.max' => 'Link không được vượt quá 255 ký tự.',

            'ngay_bat_dau.date' => 'Ngày bắt đầu phải là một ngày hợp lệ.',

            'ngay_ket_thuc.date' => 'Ngày kết thúc phải là một ngày hợp lệ.',
            'ngay_ket_thuc.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
        ];
    }
}
