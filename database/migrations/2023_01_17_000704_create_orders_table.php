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
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('document_id')->unsigned()->index();
           
            $table->string('transaction_id');
            $table->string('ijazah_idn_qty');
            $table->string('transkrip_idn_qty');
            $table->string('ijazah_eng_qty');
            $table->string('transkrip_eng_qty');
            $table->string('price_amount');
            $table->enum('status', ['Pending','Confirm','Delivery','Success','Failed'])->default('Pending');
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
        Schema::dropIfExists('orders');
    }
};
