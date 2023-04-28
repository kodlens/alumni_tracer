<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id('address_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('country_boarding')->nullable();
            $table->string('province_boarding')->nullable();
            $table->string('city_boarding')->nullable();
            $table->integer('district_boarding')->nullable();
            $table->string('brgy_boarding')->nullable();
            $table->string('zipcode_boarding')->nullable();
            //work
            $table->string('country_work')->nullable();
            $table->string('province_work')->nullable();
            $table->string('city_work')->nullable();
            $table->integer('district_work')->nullable();
            $table->string('brgy_work')->nullable();
            $table->string('zipcode_work')->nullable();
            //perm
            $table->string('country_perm')->nullable();
            $table->string('province_perm')->nullable();
            $table->string('city_perm')->nullable();
            $table->integer('district_perm')->nullable();
            $table->string('brgy_perm')->nullable();
            $table->string('zipcode_perm')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
