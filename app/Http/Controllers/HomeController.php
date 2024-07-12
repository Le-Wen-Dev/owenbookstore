<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


class HomeController extends Controller
{
       public function index(){
        $products= Products::orderBy('view', 'desc')->paginate(10);
        return view('compoments.home',compact('products'));
       }

}
