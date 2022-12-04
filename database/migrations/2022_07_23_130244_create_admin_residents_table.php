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
        Schema::create('admin_residents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('street')->nullable();
            $table->integer('house_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('voter_status')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('occupation')->nullable();
            $table->string('work_status')->nullable();
            $table->string('password');
            $table->string('resident_image')->nullable();
            $table->string('id_image')->nullable();
            $table->integer('userType');
            $table->integer('status')->nullable();

            $table->timestamps();

            $table->index('user_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_residents');
    }
};
