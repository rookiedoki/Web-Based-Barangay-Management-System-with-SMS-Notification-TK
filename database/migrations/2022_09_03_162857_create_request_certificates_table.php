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
    Schema::create('request_certificates', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('admin_resident_id');
      $table->string('fullname');
      $table->string('doctype');
      $table->string('paymentMethod');
      $table->string('contact_number');
      $table->string('referenceNumber')->nullable();
      $table->string('purpose');
      $table->string('otherPurpose')->nullable();
      $table->enum('status', ['pending', 'declined', 'approved'])->default('pending');
      $table->string('screenshot')->nullable();
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
    Schema::dropIfExists('request_certificates');
  }
};
