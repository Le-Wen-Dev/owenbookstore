<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;

class ProductController extends Controller
{
    public function products(){

        return view('admin.products.products');
    }
    public function categories(){

        return view('admin.category.categories',compact('count', 'total'));
    }
}
