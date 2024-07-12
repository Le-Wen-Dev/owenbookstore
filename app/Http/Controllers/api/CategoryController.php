<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function index(){
        $category = Category::orderBy('id', 'desc')->get();
        return response()->json([
            'status' =>200,
            'message' =>$category,
        ]);
    }
    //insert into category 
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'home' => 'required|string',
            'stt' => 'required|string',
            'hidden' => 'required|string',
        ]);
    
        // Tạo một đối tượng category mới
        $category = new Category();
        $category->name = $request->input('name');
        $category->home = $request->input('home');
        $category->stt = $request->input('stt');
        $category->hidden = $request->input('hidden');
    
        // Lưu đối tượng category vào cơ sở dữ liệu
        $category->save();
    
        // Trả về phản hồi JSON cho client
        return response()->json([
            'status' => 201,
            'message' => 'Thêm danh mục thành công',
            'data' => $category,
        ]);
    }
    
    //update category 
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'home' => 'required|string',
            'stt' => 'required|string',
            'hidden' => 'required|string',
        ]);
    
        $category = Category::find($id);
    
        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Không có danh mục',
            ], 404);
        }
        $category->name = $request->input('name');
        $category->home = $request->input('home');
        $category->stt = $request->input('stt');
        $category->hidden = $request->input('hidden');
    
        $category->save();
    
        return response()->json([
            'status' => 200,
            'message' => 'Sửa danh mục thành công',
            'data' => $category,
        ]);
    }
    
    //detele categorys
    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->hidden = 1; // ẩn danh mục 
        $category->save();

        return response()->json([
            'status' => 204,
            'message' => 'Ẩn danh mục',
        ]);
    }
}
