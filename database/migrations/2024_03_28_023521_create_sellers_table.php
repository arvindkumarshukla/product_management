<?php
// database/migrations/YYYY_MM_DD_create_sellers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('seller_name');
            $table->unsignedBigInteger('seller_stock');
            $table->unsignedInteger('est_shipping_days');
            $table->decimal('selling_price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
