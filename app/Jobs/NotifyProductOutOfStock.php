<?php

namespace App\Jobs;

use App\Models\products; 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductOutOfStockNotification;

class NotifyProductOutOfStock implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $product;

    /**
     * Create a new job instance.
     *
     * @param products $product
     * @return void
     */
    public function __construct(products $product) // Sửa tên model thành products
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Kiểm tra xem sản phẩm có quantity bằng 0 không
        if ($this->product->quantity == 0) {
            // Gửi email thông báo
            Mail::to(config('mail.from.address'))->send(new ProductOutOfStockNotification($this->product));
        }
    }
}
