@extends('layouts.client')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <div class="container">
                {{ session('success') }}
            </div>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            <div class="container">
                {{ session('error') }}
            </div>
        </div>
    @endif


    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{route('index')}}">Trang Chủ</a></li>
                    <li class="active">Wishlist</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wishlist-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-thumbnail">Ảnh</th>
                                        <th class="cart-product-name">Sản Phẩm</th>
                                        <th class="li-product-price">Đơn Giá</th>
                                        <th class="li-product-stock-status">Tình Trạng</th>
                                        <th class="li-product-add-cart">Xem Sản Phẩm</th>
                                        <th class="li-product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($wishlist->isEmpty())
                                        <!-- Kiểm tra nếu không có sản phẩm yêu thích -->
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                Bạn chưa có sản phẩm yêu thích nào, hãy <a href="{{ route('index') }}"> THÊM
                                                    NGAY </a>.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($wishlist as $item)
                                            <tr>
                                                <td class="li-product-thumbnail">
                                                    {{-- <a href="#"><img
                                                            src="{{ Storage::url($item->product->hinh_anh) }}"
                                                            alt=""></a> --}}
                                                </td>
                                                <td class="li-product-name"><a
                                                        href="#">{{ $item->product->ten_san_pham }}</a></td>
                                                <td class="li-product-price"><span class="amount">
                                                        @if ($item->product->gia_khuyen_mai > 0)
                                                            <span
                                                                class="new-price text-danger">{{ number_format($item->product->gia_khuyen_mai) }}
                                                                VND</span>
                                                            <del class="small">{{ number_format($item->product->gia_san_pham) }}
                                                                VND</del>
                                                        @else
                                                            {{ number_format($item->product->gia_san_pham) }} VND
                                                        @endif
                                                    </span></td>
                                                <td class="li-product-stock-status">
                                                    @if ($item->product->so_luong > 0)
                                                        <span class="in-stock">Còn hàng</span>
                                                    @else
                                                        <span class="out-of-stock">Hết hàng</span>
                                                    @endif
                                                    </span>
                                                </td>
                                                <td class="li-product-add-cart">
                                                    @if ($item->product->so_luong > 0)
                                                        <a href="{{ route('product-detail', $item->product->slug) }}">Xem</a>
                                                    @else
                                                        <a href="#" class="disabled"
                                                            style="pointer-events: none; color: gray;">Hết hàng</a>
                                                    @endif
                                                </td>
                                                <td class="li-product-remove">
                                                    
                                                    <form id="remove-form-{{ $item->id }}" method="POST" action="{{ route('wishlist.remove', ['id' => $item->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a href="#" onclick="event.preventDefault(); document.getElementById('remove-form-{{ $item->id }}').submit();">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
