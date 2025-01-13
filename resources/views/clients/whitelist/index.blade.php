{{-- @extends('layouts.client')

@section('content')
    @foreach ($whitelistedProducts as $whitelist)
        @if ($whitelist->product)
            <div>{{ $whitelist->product->ten_san_pham }}</div>  <!-- Truy cập sản phẩm qua quan hệ -->
        @else
            <div>Sản phẩm không tồn tại.</div>
        @endif
    @endforeach
@endsection --}}

@extends('layouts.client')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="wishlist-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- <form method="POST" action="{{ route('whitelist.removeAll') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa tất cả</button>
                    </form> --}}
                    
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Xóa</th>
                                    <th class="li-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="li-product-price">Đơn giá</th>
                                    <th class="li-product-stock-status">Tình trạng</th>
                                    <th class="li-product-add-cart">Thêm vào giỏ</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($whitelistedProducts as $whitelist)
                                    <tr>
                                        <td class="li-product-remove">
                                            <form method="POST" action="{{ route('whitelist.remove', ['id' => $whitelist->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-times"></i> Xóa
                                                </button>
                                            </form>
                                        </td>
                                        <td class="li-product-thumbnail">
                                            <a href="#"><img src="{{ asset('images/wishlist-thumb/' . $whitelist->product->image) }}" alt=""></a>
                                        </td>
                                        <td class="li-product-name">
                                            <a href="#">{{ $whitelist->product->ten_san_pham }}</a>
                                        </td>
                                        <td class="li-product-price"><span class="amount">{{ number_format($whitelist->product->gia_khuyen_mai > 0 ? $whitelist->product->gia_khuyen_mai : $whitelist->product->gia_san_pham) }} đ</span></td>
                                        <td class="li-product-stock-status">
                                            <span class="{{ $whitelist->product->trang_thai == 'in_stock' ? 'in-stock' : 'out-stock' }}">
                                                {{ $whitelist->product->trang_thai == 'in_stock' ? 'Còn hàng' : 'Hết hàng' }}
                                            </span>
                                        </td>
                                        <td class="li-product-add-cart"><a href="{{ route('cart.store') }}">Thêm vào giỏ hàng</a></td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
                            <tbody>
                                @if($whitelistedProducts->isEmpty()) <!-- Kiểm tra nếu không có sản phẩm yêu thích -->
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Bạn chưa có sản phẩm yêu thích nào, hãy  <a href="{{ route('index') }}"> THÊM NGAY  </a>.
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($whitelistedProducts as $whitelist)
                                        <tr>
                                            <td class="li-product-remove">
                                                <form method="POST" action="{{ route('whitelist.remove', ['id' => $whitelist->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-times"></i> Xóa
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="li-product-thumbnail">
                                                <a href="#"><img src="{{ asset('images/wishlist-thumb/' . $whitelist->product->image) }}" alt=""></a>
                                            </td>
                                            <td class="li-product-name">
                                                <a href="#">{{ $whitelist->product->ten_san_pham }}</a>
                                            </td>
                                            <td class="li-product-price"><span class="amount">{{ number_format($whitelist->product->gia_khuyen_mai > 0 ? $whitelist->product->gia_khuyen_mai : $whitelist->product->gia_san_pham) }} đ</span></td>
                                            <td class="li-product-stock-status">
                                                <span class="{{ $whitelist->product->trang_thai == 'in_stock' ? 'in-stock' : 'out-stock' }}">
                                                    {{ $whitelist->product->trang_thai == 'in_stock' ? 'Còn hàng' : 'Hết hàng' }}
                                                </span>
                                            </td>
                                            <td class="li-product-add-cart"><a href="{{ route('cart.store') }}">Thêm vào giỏ hàng </a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
