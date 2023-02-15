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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('vehicle_id')->nullable();
            $table->string('order_number')->nullable();
            $table->string('order_status')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_state')->nullable();
            $table->string('delivery_zip')->nullable();
            $table->text('delivery_instructions')->nullable();
            $table->timestamps();

            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('vehicle_id')->references('id')->on('vehicles');
            //$table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
