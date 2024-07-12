<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Carts;
use App\Models\categories;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cat;

    public function __construct()
    {
        $this->cat = new categories();
    }
    public function index()
{
    // Check if the user is authenticated
    if (!auth()->check()) {
        // Redirect to the login page with an error message
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
    }

    // Get the authenticated user's ID
    $id_user = auth()->id();

    // Retrieve the user's cart items
    $cart = Carts::where('id_user', $id_user)->get();

    // Fetch categories (if needed)
    $categories = $this->cat->queryCat();

    // Return the cart view with cart items and categories
    return view('compoments.cart', compact('cart', 'categories'));
}

    
public function addToCart(Request $request)
{
    // Check if the user is authenticated
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
    }

    // Get the authenticated user's ID
    $id_user = auth()->id();
    $id_product = $request->input('id');

    // Check if the product already exists in the user's cart
    $cartItem = Carts::where('id_user', $id_user)
        ->where('id_product', $id_product)
        ->first();

    if ($cartItem) {
        // If the product exists, increment the quantity and update the total
        $cartItem->increment('quantity');
        $cartItem->total = $cartItem->price * $cartItem->quantity;
        $cartItem->save();
    } else {
        // If the product does not exist, create a new cart entry
        Carts::create([
            'id_user' => $id_user,
            'id_product' => $request->id,
            'name_product' => $request->name,
            'img' => $request->img,
            'price' => $request->price,
            'total' => $request->price,
            'quantity' => 1,
        ]);
    }

    // Retrieve the product details (if needed)
    $product = Products::findOrFail($request->id);

    // Fetch categories (if needed)
    $categories = $this->cat->queryCat();

    // Get the user's cart items
    $cart = Carts::where('id_user', $id_user)->get();

    // Return the cart view with the cart items, product, and categories
    return view('compoments.cart', compact('cart', 'product', 'categories'));
}
    
//         $request = $request->all();
//  var_dump($request);
    

    // Hàm decreaseCart trong CartController
    public function decreaseCart(Request $request)
    {
        $idProduct = $request->input('id'); // Sửa từ 'id' thành 'id_product'
        $id_user = $request->input('id_user');

        // Lấy thông tin sản phẩm từ giỏ hàng
        $cartItem = Carts::where('id', $idProduct)
            ->where('id_user', $id_user)
            ->first();

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if ($cartItem) {
            // Kiểm tra nếu số lượng sản phẩm > 1 thì mới giảm
            if ($cartItem->quantity > 1) {
                $cartItem->decrement('quantity');
                $cartItem->total = $cartItem->price * $cartItem->quantity;
                $cartItem->save(); // Giảm số lượng sản phẩm đi 1
                // return response()->json(['success' => true, 'quantity' => $cartItem->quantity]);
            }
        }
        $product = Products::findOrFail($request->id);

        // Lấy danh sách danh mục (nếu cần)
        $categories = $this->cat->queryCat();
        $cart = Carts::where('id_user', $id_user)->get();

        // Trả về view cart cùng với thông tin của sản phẩm vừa thêm vào giỏ hàng
        return view('compoments.cart', compact('cart', 'product', 'categories'));
    }
    public function increaseCart(Request $request)
    {
        $idProduct = $request->input('id'); // Sửa từ 'id' thành 'id_product'
        $id_user = $request->input('id_user');
        // var_dump($idProduct);
        // var_dump($id_user);
        // Lấy thông tin sản phẩm từ giỏ hàng
        $cartItem = Carts::where('id', $idProduct)
            ->where('id_user', $id_user)
            ->first();

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if ($cartItem) {
            // Kiểm tra nếu số lượng sản phẩm > 1 thì mới giảm
            $cartItem->increment('quantity');
            $cartItem->total = $cartItem->price * $cartItem->quantity;
            $cartItem->save(); // tang số lượng sản phẩm len 1
            // return response()->json(['success' => true, 'quantity' => $cartItem->quantity]);
        }
        $product = Products::findOrFail($request->id);

        // Lấy danh sách danh mục (nếu cần)
        $categories = $this->cat->queryCat();
        $cart = Carts::where('id_user', $id_user)->get();

        // Trả về view cart cùng với thông tin của sản phẩm vừa thêm vào giỏ hàng
        return view('compoments.cart', compact('cart', 'product', 'categories'));
    }

    public function removeCart(Request $request)
    {
        $idProduct = $request->input('id'); // Sửa từ 'id' thành 'id_product'
        $id_user = $request->input('id_user');

        // Lấy thông tin sản phẩm từ giỏ hàng

        $cartItem = Carts::where('id', $idProduct)
            ->where('id_user', $id_user)
            ->first();
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if ($cartItem) {
            // Xóa sản phẩm khỏi giỏ hàng
            $cartItem->delete();
        }


        $product = Products::findOrFail($request->id);

        // Lấy danh sách danh mục (nếu cần)
        $categories = $this->cat->queryCat();
        $cart = Carts::where('id_user', $id_user)->get();

        // Trả về view cart cùng với thông tin của sản phẩm vừa thêm vào giỏ hàng
        return view('compoments.cart', compact('cart', 'product', 'categories'));
    }
}
