<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\categories;
use App\Models\Carts;
use Illuminate\Http\Request;


class HomeController extends Controller
{
       // protected $cat;

       // public function __construct()
       // {
       //     $this->cat = new categories();
       // }
       public function index(){
              // Sản phẩm mới nhất
              $products = Products::orderBy('created_at', 'desc')->paginate(10);
          
              // Tính giá sale nếu sản phẩm có sale > 0
              $products->transform(function($product) {
                  if ($product->sale > 0) {
                      $product->sale_price = $product->price - ($product->price * ($product->sale / 100));
                  } else {
                      $product->sale_price = $product->price;
                  }
                  return $product;
              });
          
              // Sản phẩm nhiều lượt xem
              $product_popular = Products::orderBy('view', 'desc')->paginate(10);
          
              // Category
              $category = categories::orderBy('id', 'desc')->paginate(7);
          
              // Danh mục nhiều sản phẩm nhất
              $categories = Categories::withCount('products')
                  ->orderBy('products_count', 'desc')
                  ->paginate(6);
          
              // Lấy sản phẩm theo phần trăm giảm giá, sắp xếp theo phần trăm giảm giá giảm dần và phân trang
              $saleProducts = Products::where('sale', '>', 0)
                  ->orderBy('sale', 'desc')
                  ->paginate(10);
          
              // Tính giá sale cho các sản phẩm giảm giá
              $saleProducts->transform(function($product) {
                  $product->sale_price = $product->price - ($product->price * ($product->sale / 100));
                  return $product;
              });
          
              return view('components.home', compact('products', 'category', 'categories', 'product_popular', 'saleProducts'));
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
                                   $id_user = auth()->id();
                                   $cart = Carts::where('id_user', $id_user)->get();
                                 $total = 0;
                                 foreach ($cart as $item) {
                                     $item->total = $item->price * $item->quantity;
                                     $total += $item->total;
                                 }
                                 $count = count($cart);

              return view('components.products_by_category', compact('categories', 'products', 'categoryProduct','cart','total'));
              }
              public function get_product_detail($id)
              {
              $product = Products::findOrFail($id);
              // Lấy danh mục của sản phẩm
              $related_products = Products::where('categories_id', $product->categories_id)->where('id', '!=', $id)->get();
              return view('components.detail', compact('product', 'related_products'));
              }
       public function allproduct(){
              $products = Products::orderBy('id', 'desc')->paginate(15);
              return view('components.allproduct',compact('products'));
              }

              public function search(Request $request)
              {
                  $search = $request->input('search');
                  $results = Products::where('name', 'LIKE', "%{$search}%")->paginate(10);
                  $results->appends(['search' => $search]);
                  
               
                  return view('components.search', ['results' => $results]);
              }
}

