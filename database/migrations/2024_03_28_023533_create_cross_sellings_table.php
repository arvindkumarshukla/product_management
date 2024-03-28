<?php
// database/migrations/YYYY_MM_DD_create_cross_sellings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossSellingsTable extends Migration
{
    public function up()
    {
        Schema::create('cross_sellings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumbnail_image');
            $table->decimal('mrp', 10, 2);
            $table->unsignedTinyInteger('rating');
            $table->unsignedInteger('sales');
            $table->boolean('is_wholesale');
            $table->boolean('awafx_choice');
            $table->boolean('best_selling');
            $table->text('carbon_footprint')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cross_sellings');
    }
}
