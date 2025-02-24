<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Kiểm tra quyền admin
            if (Auth::user()->is_role == 0) {
                return $next($request);
            }
        }

        // Nếu không phải admin hoặc chưa đăng nhập, chuyển hướng về trang chủ
        return redirect('/')->with('error', 'You are not authorized to access this page.');
    }
}


?>