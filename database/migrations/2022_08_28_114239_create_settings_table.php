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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('barangay_name');
            $table->string('barangay_logo');
            $table->string('barangay_logo2');
            $table->string('brgy_location');
            $table->string('brgy_email');
            $table->longText('description');
            $table->longText('vission');
            $table->longText('mission');
            $table->string('goal');
            $table->string('system_logo');
            $table->string('system_title');
            $table->longText('about_section1');
            $table->longText('about_section2');

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
};
