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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('number_plate')->unique()->nullable();
            $table->string('capacity')->nullable();
            $table->string('type')->nullable();
            $table->enum('status', ['Available', 'Loading', 'In Transit'])->nullable();
            $table->string('current_location')->nullable();
            $table->timestamp('last_dispatch_at')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
