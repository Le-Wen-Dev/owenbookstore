<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiProducts extends Controller
{
    //
    public function api()
    {
        // Gọi API
        $response = Http::get('https://blog.owenbook.store/api/news'); // Thay đổi URL theo API của bạn

        // Kiểm tra phản hồi
        if ($response->successful()) {
            $data = $response->json(); // Giải mã JSON từ API
        } else {
            // Xử lý lỗi nếu cần
            $data = [];
        }

        // Truyền dữ liệu đến view
        return view('components.home', ['data' => $data]);
    }
}
