<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('Banner');//Banner or AdsBanner
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->string('order_no');
            $table->date('start_time');
            $table->date('end_time');
            $table->string('image_lg');
            $table->string('ads_banner_position')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
