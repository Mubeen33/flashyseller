<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->bigInteger('image_id');
            $table->string('made_by')->nullable();
            $table->string('what_is_it')->nullable();
            $table->string('made_date')->nullable();
            $table->string('renewal');
            $table->string('product_type');
            $table->string('sku');
            $table->string('video_link')->nullable();
            $table->tinyInteger('approved')->default(0);
            $table->boolean('disable')->default(0);
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
