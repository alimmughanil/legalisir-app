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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('document_id')->constrained('documents');
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