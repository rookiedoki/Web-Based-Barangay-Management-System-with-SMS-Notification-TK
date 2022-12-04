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
    Schema::create('blotters', function (Blueprint $table) {
      $table->id();
      $table->string('complainant');
      $table->string('respondent');
      $table->string('victim');
      // $table->string('type');
      $table->string('location');
      $table->string('date');
      $table->string('time');
      $table->longText('details');
      $table->string('proof')->nullable();;
      $table->enum('estado', ['pending', 'approved', 'declined'])->default('pending');
      $table->softDeletes();
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
    Schema::dropIfExists('blotters');
  }
};
