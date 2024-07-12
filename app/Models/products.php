<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $products =[
        
    ];
    // public function category()
    // {
    //     return $this->belongsTo(Categories::class);
    // }
    protected $fillable = ['name', 'price', 'img','category_id', 'description'];
    // public function products(){
        
    // }
}
