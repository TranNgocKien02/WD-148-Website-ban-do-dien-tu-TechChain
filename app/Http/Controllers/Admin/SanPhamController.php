<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\Hang;
use App\Models\HinhAnhSanPham;
use App\Models\ProductVariant;
use Illuminate\Support\Str;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSanPhamRequest;
use App\Http\Requests\UpdateSanPhamRequest;


class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    const PATH_UPLOAD = 'sanphams';


    public function index()
    {
        $title = "Sản phẩm";

        $listSanPham = SanPham::latest()->get();

        return view('admins.sanphams.index', compact('title', 'listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = "Thêm sản phẩm";
        $listDanhMuc = DanhMuc::get();
        $listHang = Hang::get();

        return view('admins.sanphams.create', compact('title', 'listDanhMuc', 'listHang'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSanPhamRequest $request)
    {
        $data = $request->except(['variants', 'hinh_anh_san_phams', 'hinh_anh']);
        if ($request->hasFile('hinh_anh')) {
            $data['hinh_anh'] = Storage::put(self::PATH_UPLOAD, $request->file('hinh_anh'));
        } else {
            $data['hinh_anh'] = '';
        }

        $data['is_active'] ??= 0;

        $data['trang_thai'] = $request->filled('ngay_dang_ban') ? 'da_len_lich' : 'ban_nhap';
        // dd($data['trang_thai']);
        $category = DanhMuc::find($data['danh_muc_id']);
        $categoryPrefix = strtoupper(implode('', array_map(fn($word) => Str::substr($word, 0, 1), explode(' ', $category->ten_danh_muc))));
        $randomNumber = rand(100000, 999999);
        $creationDate = now()->format('d');

        $data['ma_san_pham'] = $categoryPrefix . '-' . $creationDate . $randomNumber;

        // $data['is_best_sale'] = !empty($data['is_best_sale']) ? 1 : 0;
        // $data['is_40_sale'] = !empty($data['is_40_sale']) ? 1 : 0;
        // $data['is_hot_online'] = !empty($data['is_hot_online']) ? 1 : 0;

        $listProVariants = $request->variants;
        $dataProVariants = [];
        if (!empty($listProVariants)) { // Kiểm tra nếu không rỗng
            foreach ($listProVariants as $item) {
                $dataProVariants[] = [
                    'dung_luong' => $item['dung_luong'],
                    'mau_sac' => $item['mau_sac'],
                    'anh' => !empty($item['anh']) ? Storage::put('variants', $item['anh']) : null,
                    'so_luong' => $item['so_luong'],
                    'gia' => $item['gia']
                ];
            }
        }

        $listProGalleries = $request->hinh_anh_san_phams ?: [];
        $dataProGalleries = [];
        foreach ($listProGalleries as $item) {
            if (!empty('hinh_anh')) {
                $dataProGalleries[] = [
                    'hinh_anh' => Storage::put('hinh_anh_san_phams', $item)
                ];
            }
        }

        try {
            DB::beginTransaction();
            // Insert Product 
            $product = SanPham::query()->create($data);

            // Insert ProductVariant
            foreach ($dataProVariants as $item) {
                $item += ['san_pham_id' => $product->id];
                ProductVariant::query()->create($item);
            }

            // Insert ProductGallery
            foreach ($dataProGalleries as $item) {
                $item += ['san_pham_id' => $product->id];
                HinhAnhSanPham::query()->create($item);
            }

            DB::Commit();
            // return back();
            return redirect()->route('admins.sanphams.index')->with('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            // DELETE IMAGE in STORAGE

            if (isset($data['hinh_anh'])) {
                Storage::delete($data['hinh_anh']);
            }
            foreach ($dataProVariants as $item) {
                if (isset($item['anh'])) {
                    Storage::delete($item['anh']);
                }
            }
            foreach ($dataProGalleries as $item) {
                if (isset($item['hinh_anh'])) {
                    Storage::delete($item['hinh_anh']);
                }
            }
            // return back();
            return dd($exception);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SanPham $sanPham)
    {
        $title = "Sản phẩm";
        $listDanhMuc = DanhMuc::get();
        $listHang = Hang::get();

        $img_gallery = HinhAnhSanPham::where('san_pham_id', $sanPham->id)->get();
        // dd($img_gallery);
        $variants = ProductVariant::query()->where('san_pham_id', $sanPham->id)->orderBy('created_at')->get();


        return view('admins.sanphams.show', compact('title', 'sanPham',  'listDanhMuc', 'listHang', 'img_gallery', 'variants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SanPham $sanPham)
    {

        $title = "Sửa sản phẩm";
        $listDanhMuc = DanhMuc::get();
        $listHang = Hang::get();
        $img_gallery = HinhAnhSanPham::where('san_pham_id', $sanPham->id)->pluck('hinh_anh', 'id')->all();
        $variants = ProductVariant::query()->where('san_pham_id', $sanPham->id)->orderBy('created_at')->get();


        return view('admins.sanphams.edit', compact('title', 'sanPham',  'listDanhMuc', 'listHang', 'img_gallery', 'variants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSanPhamRequest $request, SanPham $sanPham)
    {
        // dd($request->all());
        $data = $request->except(['variants', 'hinh_anh_san_phams', 'hinh_anh']);
        if ($request->hasFile('hinh_anh')) {
            $data['hinh_anh'] = Storage::put(self::PATH_UPLOAD, $request->file('hinh_anh'));
            if (!empty($sanPham->hinh_anh) && Storage::exists($sanPham->hinh_anh)) {
                Storage::delete($sanPham->hinh_anh);
            }
        } else {
            $data['hinh_anh'] = $sanPham->hinh_anh;
        }
        $data['trang_thai'] = $request->filled('ngay_dang_ban') ? 'da_len_lich' : 'ban_nhap';

        $data['is_active'] ??= 0;

        $category = DanhMuc::find($data['danh_muc_id']);
        $categoryPrefix = strtoupper(implode('', array_map(fn($word) => Str::substr($word, 0, 1), explode(' ', $category->ten_danh_muc))));
        $randomNumber = rand(100000, 999999);
        $creationDate = now()->format('d');

        $data['ma_san_pham'] = $categoryPrefix . '-' . $creationDate . $randomNumber;

        // $data['slug'] = Str::slug($data['name']) . '-' . $data['sku'];
        // $data['is_best_sale'] = !empty($data['is_best_sale']) ? 1 : 0;
        // $data['is_40_sale'] = !empty($data['is_40_sale']) ? 1 : 0;
        // $data['is_hot_online'] = !empty($data['is_hot_online']) ? 1 : 0;

        $listProGalleries = $request->hinh_anh_san_phams ?: [];
        $dataProGalleries = [];
        foreach ($listProGalleries as $item) {
            if (!empty($item)) {
                $dataProGalleries[] = [
                    'hinh_anh' => Storage::put('hinh_anh_san_phams', $item),
                ];
            }
        }

        $listProVariants = $request->variants;
        $dataProVariants = [];
        if (!empty($listProVariants)) { // Kiểm tra nếu không rỗng
            foreach ($listProVariants as $item) {
                $dataProVariants[] = [
                    'dung_luong' => $item['dung_luong'],
                    'mau_sac' => $item['mau_sac'],
                    'anh' => !empty($item['anh']) ? Storage::put('variants', $item['anh']) : null,
                    'so_luong' => $item['so_luong'],
                    'gia' => $item['gia']
                ];
            }
        }



        try {
            DB::beginTransaction();

            $sanPham->update($data);

            $existingVariants = ProductVariant::where('san_pham_id', $sanPham->id)->get();
            $existingVariantIds = $existingVariants->pluck('id')->toArray();
            $requestVariantIds = is_array($listProVariants) ? array_column($request->variants, 'id') : [];
            $variantsToDelete = array_diff($existingVariantIds, $requestVariantIds);
            $variantsToDeleteRecords = ProductVariant::whereIn('id', $variantsToDelete)->get();
            foreach ($variantsToDeleteRecords as $variant) {
                if ($variant->anh && Storage::exists($variant->anh)) {
                    Storage::delete($variant->anh);
                }
            }
            ProductVariant::destroy($variantsToDelete);

            foreach ($dataProVariants as $key => $item) {
                $item += ['san_pham_id' => $sanPham->id];
                $variantId = $request->variants[$key]['id'] ?? null;
                $productVariant = !empty($variantId) ? ProductVariant::find($variantId) : null;
                if ($productVariant) {
                    $productVariant->update([
                        'anh' => $item['anh'] ?? $productVariant->anh,
                        'dung_luong' => $item['dung_luong'],
                        'mau_sac' => $item['mau_sac'],
                        'so_luong' => $item['so_luong'],
                        'gia' => $item['gia'],
                    ]);
                } else {
                    ProductVariant::create($item);
                }
            }
            

            // Insert ProductGallery
            foreach ($dataProGalleries as $item) {
                $item += ['san_pham_id' => $sanPham->id];
                HinhAnhSanPham::create($item);
            }

            DB::commit();
            return redirect()->route('admins.sanphams.index')->with('success', 'Sửa sản phẩm thành công');
        } catch (\Exception $exception) {
            DB::rollBack();

            // Xóa các ảnh đã lưu trong trường hợp có lỗi
            if (isset($data['hinh_anh'])) {
                Storage::delete($data['hinh_anh']);
            }
            foreach ($dataProVariants as $item) {
                if (isset($item['anh'])) {
                    Storage::delete($item['anh']);
                }
            }
            foreach ($dataProGalleries as $item) {
                if (isset($item['hinh_anh'])) {
                    Storage::delete($item['hinh_anh']);
                }
            }
            return dd($exception);

            // return back()->with('error', 'Đã xảy ra lỗi: ' . $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SanPham $sanPham)
    {
        // $product->delete();
        try {
            DB::beginTransaction();
            $sanPham->hinhAnhSanPham()->delete();

            // DELETE ORDER

            $sanPham->productVariants()->delete();

            $sanPham->delete();

            // $sanPhams = sanPham::orderBy('id')->get();

            // DELETE IMAGE in Storage
            if ($sanPham->hinh_anh) {
                Storage::delete($sanPham->hinh_anh);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception);
            return back()->with('message', 'Lỗi');
        }
        return back()->with('message', 'Xóa thành công');
    }
}
