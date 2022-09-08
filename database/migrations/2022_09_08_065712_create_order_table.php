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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('transaction_user_id')->unsigned();
            $table->bigInteger('product_user_id')->unsigned();
            $table->bigInteger('customer_user_id')->unsigned();
            $table->foreign('transaction_user_id')->references('id')->on('transaction')->onDelete('cascade');
            $table->foreign('product_user_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('customer_user_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('amount')->default(0);
            $table->integer('quantity')->default(0);
            $table->smallInteger('status'); // 0: not complete, 1: completed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
