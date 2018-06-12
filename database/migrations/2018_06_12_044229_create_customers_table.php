<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('email')->nullable();
            $table->string('phonenumber');
            $table->string('address')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('company');
            $table->integer('type')->default(1)->comment('1: Cá nhân, 2: Doanh Nghiệp');
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
        Schema::dropIfExists('customers');
    }
}
