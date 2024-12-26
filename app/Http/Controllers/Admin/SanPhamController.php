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

        $listSanPham = SanPham::get();
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
        // dd($request->all());
        $data = $request->except(['variants', 'hinh_anh_san_phams', 'hinh_anh']);
        if ($request->hasFile('hinh_anh')) {
            $data['hinh_anh'] = Storage::put(self::PATH_UPLOAD, $request->file('hinh_anh'));
        } else {
            $data['hinh_anh'] = '';
        }
        $data['is_active'] ??= 0;

        $category = DanhMuc::find($data['danh_muc_id']); // Lấy thông tin danh mục
        // dd($category);
        $categoryPrefix = strtoupper(implode('', array_map(fn($word) => Str::substr($word, 0, 1), explode(' ', $category->ten_danh_muc))));
        $randomNumber = rand(100000, 999999);
        $creationDate = now()->format('d');

        $data['ma_san_pham'] = $categoryPrefix . '-' . $creationDate . $randomNumber;

        // $data['is_best_sale'] = !empty($data['is_best_sale']) ? 1 : 0;
        // $data['is_40_sale'] = !empty($data['is_40_sale']) ? 1 : 0;
        // $data['is_hot_online'] = !empty($data['is_hot_online']) ? 1 : 0;

        $listProVariants = $request->variants;
        $dataProVariants = [];
        foreach ($listProVariants as $item) {
            $dataProVariants[] = [
                'dung_luong' => $item['dung_luong'],
                'mau_sac' => $item['mau_sac'],
                'anh' => !empty($item['anh']) ? Storage::put('variants', $item['anh']) : null,
                'so_luong' => $item['so_luong'],
                'gia' => $item['gia']
            ];
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

        // dd($request->all());
        // if ($request->isMethod('POST')) {
        //     $param = $request->except('_token');
        //     if ($request->hasFile('hinh_anh')) {
        //        $filepath = $request->file('hinh_anh')->store('uploads/sanphams','public');
        //     }else{
        //         $filepath = null ;
        //     }
        //     $param['hinh_anh'] = $filepath ;

        //     SanPham::create($param);

        //     return redirect()->route('admins.sanphams.index')->with('success','Thêm sản phẩm thành công');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(SanPham $sanPham)
    {
        //
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
        dd($request->all());
        $data = $request->except(['variants', 'product_galleries', 'img_thumb']);
        if ($request->hasFile('img_thumb')) {
            $data['img_thumb'] = Storage::put(self::PATH_UPLOAD, $request->file('img_thumb'));
            if (!empty($sanPham->img_thumb) && Storage::exists($sanPham->img_thumb)) {
                Storage::delete($sanPham->img_thumb);
            }
        } else {
            $data['img_thumb'] = $sanPham->img_thumb;
        }

        $data['is_active'] ??= 0;
        $data['slug'] = Str::slug($data['name']) . '-' . $data['sku'];
        $data['is_best_sale'] = !empty($data['is_best_sale']) ? 1 : 0;
        $data['is_40_sale'] = !empty($data['is_40_sale']) ? 1 : 0;
        $data['is_hot_online'] = !empty($data['is_hot_online']) ? 1 : 0;

        $listProGalleries = $request->product_galleries ?: [];
        $dataProGalleries = [];
        foreach ($listProGalleries as $item) {
            if (!empty($item)) {
                $dataProGalleries[] = [
                    'image' => Storage::put('product_galleries', $item),
                ];
            }
        }

        $listProVariants = $request->variants;
        $dataProVariants = [];
        foreach ($listProVariants as $item) {
            $dataProVariants[] = [
                'product_size_id' => $item['size'],
                'product_color_id' => $item['color'],
                'image' => !empty($item['image']) ? Storage::put('variantss', $item['image']) : null,
                'quantity' => $item['quantity'],
                'price' => $item['price_2'],
            ];
        }

        $existingVariants = ProductVariant::where('product_id', $sanPham->id)->get();
        $existingVariantIds = $existingVariants->pluck('id')->toArray();
        $requestVariantIds = array_column($request->variants, 'id');
        $variantsToDelete = array_diff($existingVariantIds, $requestVariantIds);
        ProductVariant::destroy($variantsToDelete);

        try {
            DB::beginTransaction();

            $sanPham->update($data);

            foreach ($dataProVariants as $key => $item) {
                $item += ['product_id' => $sanPham->id];
                $variantId = $request->variants[$key]['id'] ?? null;
                $productVariant = !empty($variantId) ? ProductVariant::find($variantId) : null;
                if ($productVariant) {
                    $productVariant->update([
                        'product_size_id' => $item['product_size_id'],
                        'product_color_id' => $item['product_color_id'],
                        'image' => $item['image'] ?? $productVariant->image,
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                } else {
                    ProductVariant::create($item);
                }
            }

            // Insert ProductGallery
            foreach ($dataProGalleries as $item) {
                $item += ['product_id' => $sanPham->id];
                HinhAnhSanPham::create($item);
            }

            DB::commit();
            // return redirect()->route(self::PATH_VIEW . 'index')->with('message', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            DB::rollBack();

            // Xóa các ảnh đã lưu trong trường hợp có lỗi
            if (isset($data['img_thumb'])) {
                Storage::delete($data['img_thumb']);
            }
            foreach ($dataProVariants as $item) {
                if (isset($item['image'])) {
                    Storage::delete($item['image']);
                }
            }
            foreach ($dataProGalleries as $item) {
                if (isset($item['image'])) {
                    Storage::delete($item['image']);
                }
            }
            return back()->with('error', 'Đã xảy ra lỗi: ' . $exception->getMessage());
        }


        // if ($request->isMethod('PUT')) {
        //     $param = $request->except('_token','_method');

        //     $sanPham = SanPham::findOrFail($id) ;

        //     if ($request->hasFile('anh_san_pham')) {
        //         if ($sanPham->anh_san_pham && Storage::disk('public')->exists($sanPham->anh_san_pham)) {
        //             Storage::disk('public')->delete($sanPham->anh_san_pham);
        //         }
        //         $filepath = $request->file('anh_san_pham')->store('uploads/sanphams','public');
        //     }else{
        //         $filepath = $sanPham->anh_san_pham ;
        //     }
        //     $param['anh_san_pham'] = $filepath ;

        //     $sanPham->update($param) ;
        //     return redirect()->route('admins.sanphams.index')->with('success', 'Sửa sản phẩm thành công');
        // }
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
