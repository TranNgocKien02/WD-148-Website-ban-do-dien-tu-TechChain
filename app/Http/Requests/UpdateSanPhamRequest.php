<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSanPhamRequest extends FormRequest
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
            'ten_san_pham' => 'required|string|max:255', // Bắt buộc, kiểu chuỗi, tối đa 255 ký tự
            'danh_muc_id' => 'required|exists:danh_mucs,id', // Bắt buộc, phải tồn tại trong bảng danh_mucs
            'gia_san_pham' => 'required|numeric|min:0', // Bắt buộc, kiểu số, giá trị không âm
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg', // Không bắt buộc, định dạng hình ảnh, tối đa 2MB
            'variants' => 'nullable|array|min:1', // Bắt buộc, phải là mảng, ít nhất 1 biến thể
            'variants.*.dung_luong' => 'required|string|max:50', // Dung lượng biến thể
            'variants.*.mau_sac' => 'required|string|max:50', // Màu sắc biến thể
            'variants.*.so_luong' => 'required|integer|min:0', // Số lượng biến thể, không âm
            'variants.*.gia' => 'required|numeric|min:0', // Giá biến thể, không âm
            'hinh_anh_san_phams' => 'nullable|array', // Không bắt buộc, phải là mảng
            'hinh_anh_san_phams.*' => 'nullable|image|mimes:jpeg,png,jpg', // Mỗi ảnh trong thư viện ảnh
        ];
    }

    public function messages(): array
    {
        return [
            'ten_san_pham.required' => 'Tên sản phẩm không được để trống.',
            'danh_muc_id.required' => 'Vui lòng chọn danh mục.',
            'danh_muc_id.exists' => 'Danh mục không hợp lệ.',
            'gia_san_pham.required' => 'Giá sản phẩm không được để trống.',
            'gia_san_pham.numeric' => 'Giá sản phẩm phải là số.',
            'variants.*.dung_luong.required' => 'Dung lượng của biến thể là bắt buộc.',
            'variants.*.mau_sac.required' => 'Màu sắc của biến thể là bắt buộc.',
            'variants.*.so_luong.required' => 'Số lượng của biến thể là bắt buộc.',
            'variants.*.so_luong.min' => 'Số lượng của biến thể phải lớn hơn hoặc bằng 0.',
            'hinh_anh.image' => 'Hình ảnh phải là file định dạng jpeg, png hoặc jpg.',
            'hinh_anh_san_phams.*.image' => 'Mỗi hình ảnh trong thư viện phải là file định dạng jpeg, png hoặc jpg.',
        ];
    }
}
