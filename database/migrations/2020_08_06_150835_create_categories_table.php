<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('title_meta_tag')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('category_order');
            $table->string('homepage_order');
            $table->integer('commission');
            $table->tinyInteger('visibility')->default(1);
            $table->tinyInteger('show_on_homepage')->default(1);
            $table->tinyInteger('show_image_nav')->default(1);
            $table->string('image')->nullable();
            $table->boolean('deleted')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
