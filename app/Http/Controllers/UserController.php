<?php

namespace App\Http\Controllers;

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
            $user->delete();
        } else {
            echo "Không tìm thấy bản ghi!";
            return;
        }
        // Lấy danh sách sản phẩm và phân trang để trả về view
        return redirect()->route('admin/users');
    }
}