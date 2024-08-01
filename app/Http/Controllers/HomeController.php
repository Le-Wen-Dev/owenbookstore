<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\categories;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
       public function index(){
              //sản phẩm mới nhất
              $products = Products::orderBy('created_at', 'desc')->paginate(10);
              $bannersale = Products::orderBy('sale', 'desc')->limit(1)->first();
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
              $saleProducts->transform(function($product) {
                     $product->sale = $product->sale * ( $product->sale /10);
                     return $product;
              });
              $response = Http::get('https://blog.owenbook.store/api/news'); // Thay đổi URL theo API của bạn
              if ($response->successful()) {
                  $apiData = $response->json(); 
                  $apiProducts = array_slice($apiData, 0, 4);
                  // Giải mã JSON từ API
              } else {
                  $apiProducts = [];
              }
              return view('components.home', [
                  'products' => $products,
                  'category' => $category,
                  'categories' => $categories,
                  'product_popular' => $product_popular,
                  'saleProducts' => $saleProducts,
                  'apiProducts' => $apiProducts,
                  'bannersale'=>$bannersale,
              ]);

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

