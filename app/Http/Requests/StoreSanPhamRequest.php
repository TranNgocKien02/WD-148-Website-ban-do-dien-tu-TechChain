<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSanPhamRequest extends FormRequest
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
            'variants.*.so_luong' => 'required|numeric|min:0', // Số lượng biến thể, không âm
            'variants.*.gia' => 'required|numeric|min:0',
            'hinh_anh_san_phams' => 'nullable|array', // Không bắt buộc, phải là mảng
            'hinh_anh_san_phams.*' => 'nullable|image|mimes:jpeg,png,jpg', // Mỗi ảnh trong thư viện ảnh
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $variants = $this->input('variants', []);
            $uniqueVariants = [];

            foreach ($variants as $index => $variant) {
                $key = $variant['dung_luong'] . '-' . $variant['mau_sac'];

                if (isset($uniqueVariants[$key])) {
                    // Thêm lỗi vào trường tương ứng
                    $validator->errors()->add('variants.' . $index . '.dung_luong', 'Biến thể với dung lượng và màu sắc này đã tồn tại.');
                    $validator->errors()->add('variants.' . $index . '.mau_sac', 'Biến thể với dung lượng và màu sắc này đã tồn tại.');
                } else {
                    $uniqueVariants[$key] = true;
                }
            }
        });
    }


    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ten_san_pham.required' => 'Tên sản phẩm không được để trống.',
            'danh_muc_id.required' => 'Vui lòng chọn danh mục.',
            'danh_muc_id.exists' => 'Danh mục không hợp lệ.',
            'gia_san_pham.required' => 'Giá sản phẩm không được để trống.',
            'gia_san_pham.numeric' => 'Giá sản phẩm phải là số.',
            'hinh_anh.image' => 'Hình ảnh phải là file định dạng jpeg, png hoặc jpg.',
            'hinh_anh_san_phams.*.image' => 'Mỗi hình ảnh trong thư viện phải là file định dạng jpeg, png hoặc jpg.',
        ];
    }
}
