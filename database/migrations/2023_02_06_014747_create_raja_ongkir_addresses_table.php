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
        Schema::create('raja_ongkir_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('subdistrict_id')->nullable();
            $table->string('city_id');
            $table->string('province_id');
            $table->string('address');
            $table->string('urban')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('postcode');
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
        Schema::dropIfExists('raja_ongkir_addresses');
    }
};