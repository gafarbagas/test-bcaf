<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('sub_code')->nullable();
            $table->string('name');
            $table->integer('identity_number');
            $table->string('birthdate');
            $table->string('marriage_status');
            $table->string('partner_name');
            $table->integer('partner_identity_number');
            $table->string('dealer');
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('vehicle_type');
            $table->string('vehicle_color');
            $table->integer('vehicle_price');
            $table->string('insurance');
            $table->integer('down_payment');
            $table->integer('installment_time');
            $table->integer('installment_amount');
            $table->boolean('approval')->default('0');
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
        Schema::dropIfExists('submissions');
    }
};
