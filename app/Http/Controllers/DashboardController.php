<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\products;
use App\Models\categories;
use App\Models\Bills;


class DashboardController extends Controller
{
    public function dashboard(){
        $user = User::count();
        $products = products::count();
        $categories = categories::count();
        $bills = bills::count();
        return view('admin.dashboard',compact('user', 'products', 'categories', 'bills'));
    }

}
