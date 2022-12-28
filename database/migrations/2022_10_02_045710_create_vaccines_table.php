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
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('birthdate');
            $table->string('vaccine_type');
            $table->string('address');
            $table->string('dose');
            $table->string('date_first');
            $table->string('date_second')->nullable();
            $table->string('first_booster')->nullable();
            $table->string('second_booster')->nullable();
            $table->string('first_booster_date')->nullable();
            $table->string('second_booster_date')->nullable();
            $table->string('vaccine_image')->nullable();
            $table->string('booster_image')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('vaccines');
    }
};
