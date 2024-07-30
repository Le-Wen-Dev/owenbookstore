<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\products;
use App\Models\categories;

class ProductController extends Controller
{
    public function products()
    {
        $allitem = products::select('id', 'name', 'img', 'price', 'sold', 'view', 'created_at', 'body')->orderBy('id', 'desc')->paginate(5);
        $optioncat = categories::select('id', 'name')->get();
        return view('admin.products.products', compact('allitem', 'optioncat'));
    }
    public function categories()
    {

        return view('admin.category.categories', compact('count', 'total'));
    }
    public function formAddpro()
    {
        return view('admin.products.add');
    }
    public function create(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $data['img'] = $imageName;
        } else {
            return "main image not uploaded";
        }
        if ($request->hasFile('gallery')) {
            $imgGallery = [];
            foreach ($request->file('gallery') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('img'), $name);
                $imgGallery[] = $name;
            }
            $data['gallery'] = json_encode($imgGallery);
        } else {
            return "Galerry images not uploaded";
        }
        $product = products::create($data);
        return "add success";
    }
    public function formEdit()
    {
    }
    public function edit()
    {
    }
    public function remove()
    {
    }
}
