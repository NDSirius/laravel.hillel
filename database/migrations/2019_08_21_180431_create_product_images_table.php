<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('product_images')) {
            Schema::create('product_images', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('product_id');
                $table->unsignedBigInteger('product_image_id');

                $table->foreign('product_id')
                    ->references('id')
                    ->on('products');
                $table->foreign('product_image_id')
                    ->references('id')
                    ->on('product_gallery');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('product_images')) {
            Schema::dropIfExists('product_images');
        }
    }
}