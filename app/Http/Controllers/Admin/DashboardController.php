<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\ThongKe;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Lấy tổng số lượt truy cập từ cache
        $totalVisits = Cache::get('site_visits', 0);

        // 2. Lấy dữ liệu truy cập hàng ngày từ bảng `site_visits`
        $dailyVisits = DB::table('site_visits')
            ->orderBy('date', 'desc')
            ->limit(30) // Lấy dữ liệu 30 ngày gần nhất
            ->get();

        // 3. Tính lưu lượng truy cập dự đoán (15% tăng trưởng)
        $percentageIncrease = 15;
        $estimatedVisits = $totalVisits * (1 + $percentageIncrease / 100);

        // 4. Lấy số người dùng đăng ký trong tháng hiện tại
        $currentMonth = now()->format('Y-m');
        $monthlyUsers = DB::table('users')
            ->where('created_at', 'like', "$currentMonth%")
            ->count();

        // Định nghĩa khoảng thời gian "đang hoạt động" (5 phút gần đây)
        $activeThreshold = Carbon::now()->subMinutes(5);

        // Lấy danh sách người dùng đang hoạt động
        $activeUsers = User::where('last_active_at', '>=', $activeThreshold)->get();

        //    $thongKe = new ThongKe();
        //    $doanhThuHangThang = $thongKe->doanhThuHangThang();
        $doanhThuHangThang = [
            ['month' => 1, 'total_revenue' => 1000000],
            ['month' => 2, 'total_revenue' => 1200000],
            ['month' => 12, 'total_revenue' => 1500000],
        ];

        // Xử lý dữ liệu để tạo labels và data
        $labels = collect($doanhThuHangThang)->pluck('month')->map(function ($month) {
            return date('M', mktime(0, 0, 0, $month, 1)); // Tháng dạng chữ (Jan, Feb, etc.)
        })->toArray();

        $data = collect($doanhThuHangThang)->pluck('total_revenue')->toArray();
        //    dd($labels,$data);
        // 7. Trả dữ liệu về giao diện Dashboard
        return view('admins.dashboard', [
            'totalVisits' => $totalVisits,
            'dailyVisits' => $dailyVisits,
            'percentageIncrease' => $percentageIncrease,
            'estimatedVisits' => round($estimatedVisits),
            'monthlyUsers' => $monthlyUsers,
            'activeUsers' => $activeUsers,
            'labels' => $labels, // Thêm nhãn cho biểu đồ doanh thu hàng tháng
            'data' => $data,    // Thêm dữ liệu cho biểu đồ doanh thu hàng tháng
        ]);
    }
}
