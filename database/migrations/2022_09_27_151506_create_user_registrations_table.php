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
        Schema::create('user_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('nickname');
            $table->string('place_of_birth');
            $table->string('birthdate');
            $table->integer('age');
            $table->string('civil_status');
            $table->string('street');
            $table->integer('house_no');
            $table->string('gender');
            $table->string('voter_status');
            $table->string('citizenship');
            $table->string('email');
            $table->string('phone_number');
            $table->string('occupation');
            $table->string('work_status');
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->string('image_id_birth')->nullable();
            $table->integer('userType');
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
        Schema::dropIfExists('user_registrations');
    }
};
