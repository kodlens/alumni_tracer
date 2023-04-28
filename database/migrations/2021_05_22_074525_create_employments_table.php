<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id('employment_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->boolean('is_employed')->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->integer('year_from')->nullable();
            $table->string('year_to')->nullable();
            $table->boolean('current_job')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('occupation_type')->nullable();
            $table->boolean('is_first_job')->nullable();
            $table->string('work_category')->nullable();
            $table->string('take_job')->nullable();
            $table->string('monthly_range')->nullable();
            $table->string('leaving_job')->nullable();
            $table->string('find_job')->nullable();
            $table->string('satisfy_job')->nullable();
            $table->string('growth')->nullable();
            $table->string('degree_earned')->nullable();
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
        Schema::dropIfExists('employments');
    }
}
