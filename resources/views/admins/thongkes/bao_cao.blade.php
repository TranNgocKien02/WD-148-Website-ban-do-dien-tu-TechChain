@extends('layouts.admin')

@section('title', 'Biểu Đồ Thống Kê')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

@section('content')
<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Biểu Đồ Thống Kê</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="revenueChart" style="height: 400px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Đơn Hàng Đã Giao', 'Đơn Hàng Đã Hủy'],
            datasets: [{
                label: 'Tình Trạng Đơn Hàng',
                data: [{{ $data['donHangDaGiao'] }}, {{ $data['donHangDaHuy'] }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Thống Kê Tình Trạng Đơn Hàng'
                }
            }
        }
    });
</script>
@endsection
