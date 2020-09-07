<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignupContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup_contents', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->string('description')->nullable();
            $table->text('text_line_one')->nullable();
            $table->text('text_line_two')->nullable();
            $table->text('text_line_three')->nullable();
            $table->text('text_line_one_icon')->nullable();
            $table->text('text_line_two_icon')->nullable();
            $table->text('text_line_three_icon')->nullable();
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
        Schema::dropIfExists('signup_contents');
    }
}
