<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('tid');
            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->string('bank_sub_acc_id');
            $table->string('corresponsive_name');
            $table->string('corresponsive_account');
            $table->string('corresponsive_bank_id');
            $table->string('corresponsive_bank_name');
            $table->string('bank_code_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('banks');
    }
}