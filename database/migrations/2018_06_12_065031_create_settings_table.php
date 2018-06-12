<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('logo');
            $table->string('default_title');
            $table->string('default_meta_keywords')->nullable();
            $table->string('default_meta_description')->nullable();
            $table->string('default_sale_email');
            $table->string('default_phone_1')->nullable();
            $table->string('default_phone_2')->nullable();
            $table->string('default_address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('default_youtube')->nullable();
            $table->string('default_info_email')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
