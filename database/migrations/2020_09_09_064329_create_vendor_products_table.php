<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ven_id');
            $table->unsignedBigInteger('prod_id');
            $table->unsignedBigInteger('variation_id')->nullable();
            $table->integer('quantity');
            $table->integer('mk_price');
            $table->integer('price');
            $table->integer('dispatched_days')->nullable();
            $table->boolean('active')->default(0);
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('vendor_products');
    }
}
