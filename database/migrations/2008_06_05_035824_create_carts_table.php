<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // id
            $table->unsignedBigInteger('id_product'); // id_product
            $table->unsignedBigInteger('id_user'); // id_user
            $table->unsignedBigInteger('id_bill')->nullable(); // id_bill, có thể null
            $table->decimal('price', 8, 2); // price
            $table->string('img'); // img
            $table->integer('quantity'); // quantity
            $table->decimal('total', 8, 2); // total
            $table->timestamps();

            // Thiết lập khóa ngoại
            $table->foreign('id_product')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('id_bill')->references('id')->on('bills')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
