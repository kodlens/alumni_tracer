<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username')->unique();
            $table->string('lname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('ins_name')->nullable();
            $table->string('sex', 50)->nullable();
            $table->string('contact_number', 50)->nullable();
            $table->string('email')->unique();
            $table->string('role', 50);
            $table->string('program')->nullable();
            $table->string('year_graduated')->nullable();
            $table->string('alumni_classification')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('fb_account')->nullable();
            $table->string('suffix')->nullable();
            $table->string('profile_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
