@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')

@endsection



@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý bình luận sản phẩm</h4>
            </div>
        </div>
        <div class="row">
 <!-- Striped Rows -->
 <div class="col-xl-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0 align-content-center " > {{ $title }}</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <div class="table-responsive">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
                        
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
        </div>
                           
     

    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection

@section('js')

@endsection
