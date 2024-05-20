<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('email_confirmations', function (Blueprint $table) {
      $table->id();
      $table->string('code');
      $table->foreignId('user_id')->constrained(table: 'users');
      $table->string('purpose');
      $table->timestamp('expires');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('email_confirmations');
  }
};
