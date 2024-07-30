<?php

namespace App\Http\Controllers;

use App\Models\Carts;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        $alluser = User::select('id', 'name', 'email', 'status', 'img', 'address', 'phone', 'role')->orderBy('id', 'desc')->paginate(5);

        return view('admin.user.users', compact('alluser'));
    }
    public function add(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $data['img'] = $imageName;
        }
        $user = User::create($data);
        return redirect()->route('admin/users');
    }
    public function formedit(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }
    public function edit(Request $request, int $id)
    {
        $validateData = $request->except('img'); // Exclude image fields from validation
        // Check if the main image was uploaded
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $validateData['img'] = $imageName;
        }
        // Update the product
        $user = User::findOrFail($id);
        $user->update($validateData);

        return redirect()->route('admin/users');
    }
    public function remove(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            // Xóa các bản ghi liên quan trong bảng `carts`
            Carts::where('id_user', $id)->delete();

            // Xóa người dùng
            $user->delete();

            // Chuyển hướng về danh sách người dùng
            return redirect()->route('admin/users')->with('success', 'Người dùng đã được xóa thành công!');
        } else {
            // Nếu không tìm thấy người dùng, hiển thị thông báo lỗi
            return redirect()->route('admin/users')->with('error', 'Không tìm thấy người dùng!');
        }
    }
}