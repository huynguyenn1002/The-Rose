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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->string('product_name', 100);
            $table->string('description', 256);
            $table->integer('price')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('index');
            $table->string('file_name', 256);
            $table->string('path', 256);
            $table->bigInteger('view');
            $table->timestamp('regist_datetime')->nullable()->useCurrent();
            $table->timestamp('last_update')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
