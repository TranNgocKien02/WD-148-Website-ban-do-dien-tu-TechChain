<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SanPham;

class PublishScheduledProducts extends Command
{
    protected $signature = 'sanpham:update-status';
    protected $description = 'Cập nhật trạng thái sản phẩm nếu đến ngày đăng bán';

    public function handle()
    {
        $sanPhams = SanPham::where('trang_thai', 'da_len_lich')
        ->where('ngay_dang_ban', '<=', now())
            ->update(['trang_thai' => 'dang_ban']);

        $this->info("Đã cập nhật trạng thái cho {$sanPhams} sản phẩm.");
    }
}

