<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //get users 
    public function index(){
        $users = User::orderBy('id', 'desc')->get();
        return response()->json([
            'status' =>200,
            'message' =>$users,
        ]);
    }
    //insert into user 
    public function insert(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
    
        // Tạo một đối tượng User mới
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
    
        // Lưu đối tượng User vào cơ sở dữ liệu
        $user->save();
    
        // Trả về phản hồi JSON cho client
        return response()->json([
            'status' => 201,
            'message' => 'Thêm người dùng thành công',
            'data' => $user,
        ]);
    }
    
    //update user 
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'string',
            'email' => 'email|unique:users,email,' . $id,
            'password' => 'string|min:6',
        ]);
    
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
            ], 404);
        }
    
        if ($request->has('username')) {
            $user->username = $request->input('username');
        }
    
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
    
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->save();
    
        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully',
            'data' => $user,
        ]);
    }
    
    //detele users
    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Xóa người dùng
        $user->delete();

        return response()->json([
            'status' => 204,
            'message' => 'Xóa người dùng thành công',
        ]);
    }

}
