<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route("login")->with('error','Bạn phải đăng nhập để sử dụng chức năng này');
        }

        $user = Auth::user();
        if ($user->role != 1) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập');
        }

        return $next($request);
    }
}
