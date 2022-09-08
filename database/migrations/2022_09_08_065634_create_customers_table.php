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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 256)->nullable();
            $table->string('lastname', 256)->nullable();
            $table->string('mail_address', 200)->unique();
            $table->string('address', 256);
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('tel', 11)->nullable();
            $table->timestamp('regist_datetime')->nullable()->useCurrent();
            $table->timestamp('last_update')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
