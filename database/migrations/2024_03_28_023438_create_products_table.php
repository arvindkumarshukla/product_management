<?php
// database/migrations/YYYY_MM_DD_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('added_by');
            $table->string('thumbnail_image');
            $table->string('currency_symbol');
            $table->decimal('mrp', 10, 2);
            $table->boolean('is_wholesale');
            $table->unsignedTinyInteger('rating');
            $table->unsignedInteger('rating_count');
            $table->longText('description');
            $table->string('video_link')->nullable();
            $table->boolean('awafx_choice');
            $table->boolean('best_selling');
            $table->integer('est_shipping_time');
            $table->boolean('is_refurbished');
            $table->boolean('is_in_cart');
            $table->boolean('is_in_wishlist');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_img')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
