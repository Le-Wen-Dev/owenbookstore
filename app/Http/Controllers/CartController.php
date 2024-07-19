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
    $total = 0;
    foreach ($cart as $item) {
        $item->total = $item->price * $item->quantity;
        $total += $item->total;
    }
    $count = count($cart);

    // Return the cart view with cart items and categories
    return view('compoments.cart', compact('cart', 'categories','count','total'));
}
public function index_header()
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
    return view('compoments.header', compact('cart', 'categories'));
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
        return redirect()->route('home')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function removeCart(Request $request)
{
    $id = $request->input('id');
    $id_user = $request->input('id_user');

    // Lấy thông tin sản phẩm từ giỏ hàng
    $cartItem = Carts::where('id', $id)
        ->where('id_user', $id_user)
        ->first();

    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
    if ($cartItem) {
        // Xóa sản phẩm khỏi giỏ hàng
        $cartItem->delete();

        // Trả về thông báo thành công và quay lại trang giỏ hàng
        return redirect()->route('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }

    // Nếu không tìm thấy sản phẩm trong giỏ hàng
    return redirect()->route('cart')->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng.');
}
    public function removeCartheader(Request $request)
    {
        // Lấy ID của sản phẩm cần xóa từ request
        $id = $request->input('id');
        
        // Xóa sản phẩm từ giỏ hàng
        $cartItem = Carts::where('id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
        }
        
        // Redirect hoặc trả về response tùy theo yêu cầu của bạn
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
public function removeAllCart(Request $request)
{
    $id_user = $request->input('id_user');

    // Xóa tất cả các sản phẩm trong giỏ hàng của người dùng
    $deleted = Carts::where('id_user', $id_user)->delete();

    if ($deleted) {
        return redirect()->route('cart')->with('success', 'Đã xóa tất cả sản phẩm khỏi giỏ hàng!');
    } else {
        return redirect()->route('cart')->with('error', 'Không thể xóa sản phẩm khỏi giỏ hàng. Vui lòng thử lại sau.');
    }
}
}
