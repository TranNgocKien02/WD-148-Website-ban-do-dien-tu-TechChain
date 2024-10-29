<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'ma_san_pham' => 'required|max:255',
            'ten_san_pham' => 'required|max:255',
            'hinh_anh' => 'required|max:255',
            'gia_san_pham' => 'required|max:255',
            'gia_khuyen_mai' => 'required|max:255',
            'mo_ta_ngan' => 'required|max:255',
            'noi_dung' => 'required|max:255',
            'so_luong' => 'required|max:255',
            'ngay_nhap' => 'required|max:255',
            'danh_muc_id' => 'required|max:255',
            
        ];
    }

       /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            //
            'ma_san_pham.required' => 'Mã sản phẩm là bắt buộc',
            'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc',
            'hinh_anh.required' => 'Hình ảnh sản phẩm là bắt buộc',
            'gia_san_pham.required' => 'Giá sản phẩm là bắt buộc',
            'gia_khuyen_mai.required' => 'Giá khuyến mại là bắt buộc',
            'mo_ta_ngan.required' => 'Mô tả sản phẩm là bắt buộc',
            'noi_dung.required' => 'Nội dung sản phẩm là bắt buộc',
            'so_luong.required' => 'Số lượng sản phẩm là bắt buộc',
            'luot_xem.required' => 'Lượt xem sản phẩm là bắt buộc',
            'ngay_nhap.required' => 'Ngày nhập sản phẩm là bắt buộc',
            'danh_muc_id.required' => 'Danh mục sản phẩm là bắt buộc',
        ];
    }
}
