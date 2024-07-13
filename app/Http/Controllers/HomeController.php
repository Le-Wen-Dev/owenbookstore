<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\categories;
use Illuminate\Http\Request;


class HomeController extends Controller
{
       public function index(){
              $products = Products::orderBy('created_at', 'desc')->paginate(10);
              $product_popular = Products::orderBy('view', 'desc')->paginate(10);
              $category= categories::orderBy('id', 'desc')->paginate(7);
              $categories = Categories::withCount('products')
              ->orderBy('products_count', 'desc')
              ->paginate(6);
              return view('compoments.home',compact('products','category','categories','product_popular'));
              }
       public function get_products_by_idcategory($category_id)
              {
              // Lấy tất cả các category
              $categories = Categories::all();

              // Tìm category dựa trên $id_category
              $categoryProduct = Categories::findOrFail($category_id);

              // Lấy các sản phẩm thuộc category cụ thể, sắp xếp theo tên và phân trang
              $products = Products::where('categories_id', $category_id)
                                   ->orderBy('name', 'asc')
                                   ->get();

              return view('compoments.products_by_category', compact('categories', 'products', 'categoryProduct'));
              }

}
