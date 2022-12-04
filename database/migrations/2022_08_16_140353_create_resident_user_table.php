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
        Schema::create('resident_user', function (Blueprint $table) {
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
            $table->string('gender');
            $table->string('voter_status');
            $table->string('citizenship');
            $table->string('email');
            $table->string('phone_number');
            $table->string('occupation');
            $table->string('profile_image')->nullable();
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
        Schema::dropIfExists('resident_user');
    }
};
