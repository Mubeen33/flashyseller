<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identity')->default('Vendor');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 100)->unique();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->text('business_info')->nullable();
            $table->string('vat_register');
            $table->string('company_name')->nullable();
            $table->string('website_url')->nullable();
            $table->string('director_first_name')->nullable();
            $table->string('director_last_name')->nullable();
            $table->string('director_email')->nullable();
            $table->text('director_details')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('product_type')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('subrub')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('waddress')->nullable();
            $table->string('wstreet')->nullable();
            $table->string('wcity')->nullable();
            $table->string('wstate')->nullable();
            $table->string('wsubrub')->nullable();
            $table->string('wzip_code')->nullable();
            $table->string('wcountry')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('vendors');
    }
}
