<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorBankDetailsTempDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_bank_details_temp_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->string('account_holder')->nullalbe();
            $table->string('bank_name')->nullalbe();
            $table->string('bank_account')->nullalbe();
            $table->string('branch_name')->nullalbe();
            $table->string('branch_code')->nullalbe();
            $table->tinyInteger('status')->default(0);// 0/1  approved or pending by admin
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
        Schema::dropIfExists('vendor_bank_details_temp_data');
    }
}
