<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\categories;
use Illuminate\Http\Request;


class HomeController extends Controller
{
       public function index(){
              //sản phẩm mới nhất
              $products = Products::orderBy('created_at', 'desc')->paginate(10);
              //sản phẩm nhiều lượt xem
              $product_popular = Products::orderBy('view', 'desc')->paginate(10);
              //category
              $category= categories::orderBy('id', 'desc')->paginate(7);
              //danh mục nhiều sản phẩm nhất
              $categories = Categories::withCount('products')
              ->orderBy('products_count', 'desc')
              ->paginate(6);
               // Lấy sản phẩm theo phần trăm giảm giá, sắp xếp theo phần trăm giảm giá giảm dần và phân trang
               $saleProducts = Products::where('sale', '>', 0)
               ->orderBy('sale', 'desc')
               ->paginate(10);
       
              // Tính toán giá giảm cho mỗi sản phẩm
              $saleProducts->transform(function($product) {
                     $product->sale = $product->price * ( $product->sale /100);
                     return $product;
              });
              return view('compoments.home',compact('products','category','categories','product_popular','saleProducts'));
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
              public function get_product_detail($id)
              {
              $product = Products::findOrFail($id);
              // Lấy danh mục của sản phẩm
              $related_products = Products::where('categories_id', $product->categories_id)->where('id', '!=', $id)->get();
              return view('compoments.detail', compact('product', 'related_products'));
              }
       public function allproduct(){
              $products = Products::orderBy('id', 'desc')->paginate(15);
              return view('compoments.allproduct',compact('products'));
              }
}
