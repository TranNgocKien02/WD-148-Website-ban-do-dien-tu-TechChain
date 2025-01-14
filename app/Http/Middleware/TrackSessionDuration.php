<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;


class TrackSessionDuration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          // Nếu chưa có thời gian bắt đầu, lưu thời gian hiện tại
        if (!Session::has('session_start_time')) {
            Session::put('session_start_time', now());
        }

        return $next($request);
    }
    public function terminate($request, $response)
    {
        if (Session::has('session_start_time')) {
            $startTime = Session::get('session_start_time');
            $endTime = now();
    
            $duration = $endTime->diffInSeconds($startTime);
    
            // Lưu thời lượng phiên vào CSDL
            DB::table('session_logs')->insert([
                'user_id' => auth()->id(),
                'duration' => $duration,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            Session::forget('session_start_time');
        }
    }
}
