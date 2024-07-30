<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $products = [];
    // public function category()
    // {
    //     return $this->belongsTo(Categories::class);
    // }
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function getDiscountedPriceAttribute()
    {
        return $this->price * (1 - $this->sale / 100 );
    }
}
