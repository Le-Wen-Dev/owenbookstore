<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\Favorites;
use Illuminate\Http\Request;
use App\Models\categories;

class FavouriteController extends Controller
{
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
    $favorites = Favorites::where('id_user', $id_user)->get();


    // Return the cart view with cart items and categories
    return view('compoments.favorites', compact('favorites'));
}

    public function addToFavorites(Request $request)
{
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào danh sách yêu thích.');
    }

    // Lấy ID của người dùng đã xác thực
    $id_user = auth()->id();
    $id_product = $request->input('id');

    // Kiểm tra xem sản phẩm đã có trong danh sách yêu thích của người dùng chưa
    $favoriteItem = Favorites::where('id_user', $id_user)
        ->where('id_product', $id_product)
        ->first();

    if ($favoriteItem) {
        // Nếu sản phẩm đã có trong danh sách yêu thích, trả về thông báo
        return redirect()->back()->with('message', 'Sản phẩm này đã có trong danh sách yêu thích của bạn.');
    } else {
        // Nếu sản phẩm chưa có, thêm vào danh sách yêu thích
        Favorites::create([
            'id_user' => $id_user,
            'id_product' => $request->id,
            'name_product' => $request->name,
            'img' => $request->img,
            'price' => $request->price,
        ]);
    }

    // Lấy thông tin sản phẩm (nếu cần)
    $product = Products::findOrFail($request->id);

    // Lấy danh sách yêu thích của người dùng
    $favorites = Favorites::where('id_user', $id_user)->get();

    // Trả về view danh sách yêu thích cùng với các sản phẩm yêu thích và thông tin sản phẩm
    return view('compoments.favorites', compact('favorites', 'product'));
}

}
