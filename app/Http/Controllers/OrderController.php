<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        $allitem = Bills::orderBy('status', 'asc')->paginate(5);
        return view('admin.order.order', compact('allitem'));
    }

    public function updateStatus(Request $request, $id)
    {

        $order = Bills::where('id_bill', $id)->firstOrFail();
        if ($order->status == 1) {
            $order->status = 2;
        } elseif ($order->status == 2) {
            $order->status = 3;
        }

        $order->save();

        return redirect()->route('admin/orders')->with('success', 'Đã đổi trạng thái thành công');
    }


    public function remove(Request $request, int $id)
    {
        $order = Bills::findOrFail($id);
        if ($order) {
            $order->delete();
            return redirect()->route('admin/orders')->with('success', 'Đơn hàng đã xoá thành công!');
        } else {
            return redirect()->route('admin/orders')->with('error', 'Không tìm thấy đơn hàng!');
        }
    }

    public function detail(Request $request, int $id)
    {
        $order = Bills::findOrFail($id);
        $products = json_decode($order->product, true);
        return view('admin.order.detail', compact('order', 'products'));
    }
}
