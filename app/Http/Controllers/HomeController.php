<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\categories;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        // Sản phẩm mới nhất
        $products = Products::orderBy('created_at', 'desc')->paginate(10);

        // Sản phẩm bán chạy nhất
        $bannersale = Products::orderBy('sale', 'desc')->limit(1)->first();

        // Tính giá sale nếu sản phẩm có sale > 0
        $products->transform(function ($product) {
            if ($product->sale > 0) {
                $product->sale_price = $product->price - ($product->price * ($product->sale / 100));
            } else {
                $product->sale_price = $product->price;
            }
            return $product;
        });

        // Sản phẩm nhiều lượt xem
        $product_popular = Products::orderBy('view', 'desc')->paginate(10);

        // Danh mục
        $category = categories::orderBy('id', 'desc')->paginate(7);

        // Danh mục nhiều sản phẩm nhất
        $categories = categories::withCount('products')
            ->orderBy('products_count', 'desc')
            ->paginate(6);

        // Sản phẩm giảm giá
        $saleProducts = Products::where('sale', '>', 0)
            ->orderBy('sale', 'desc')
            ->paginate(10);

        // Tính giá sale cho các sản phẩm giảm giá
        $saleProducts->transform(function ($product) {
            $product->sale_price = $product->price - ($product->price * ($product->sale / 100));
            return $product;
        });

        // Lấy dữ liệu từ API
        $response = Http::get('https://blog.owenbook.store/api/news');
        if ($response->successful()) {
            $apiData = $response->json();
            $apiProducts = array_slice($apiData, 0, 4);
        } else {
            $apiProducts = [];
        }

        // Trả về view với tất cả các dữ liệu
        return view('components.home', [
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
            'product_popular' => $product_popular,
            'saleProducts' => $saleProducts,
            'apiProducts' => $apiProducts,
            'bannersale' => $bannersale,
        ]);
    }

    public function get_products_by_idcategory($category_id)
    {
        // Lấy tất cả các category
        $categories = categories::all();

        // Tìm category dựa trên $category_id
        $categoryProduct = categories::findOrFail($category_id);

        // Lấy các sản phẩm thuộc category cụ thể
        $products = Products::where('category_id', $category_id)
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

        return view('components.products_by_category', compact('categories', 'products', 'categoryProduct', 'cart', 'total'));
    }

    public function get_product_detail($id)
    {
        $product = Products::findOrFail($id);
        // Lấy danh mục của sản phẩm
        $related_products = Products::where('categories_id', $product->category_id)
            ->where('id', '!=', $id)
            ->get();
        return view('components.detail', compact('product', 'related_products'));
    }

    public function allproduct()
    {
        $products = Products::orderBy('id', 'desc')->paginate(15);
        return view('components.allproduct', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Products::where('name', 'LIKE', "%{$search}%")->paginate(10);
        $results->appends(['search' => $search]);

        return view('components.search', ['results' => $results]);
    }

    public function contact()
    {
        return view('components.contact');
    }
}
