<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SKU');
            $table->string('name');
            $table->double('price')->nullable();
            $table->double('discount_percent')->default(0);
            $table->double('discounted_price')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->double('height')->default(0);
            $table->double('weight')->default(0);
            $table->double('width')->default(0);
            $table->double('long')->default(0);
            $table->string('image_1')->nullable();
            $table->string('thumb_image')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->integer('is_new')->default(0);
            $table->integer('is_available')->default(1);
            $table->integer('can_ship')->default(1);
            $table->integer('free_ship')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->integer('display_order')->default(0);
            $table->string('meta_anchor')->nullable();
            $table->integer('category_id');
            $table->integer('manufacture_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
