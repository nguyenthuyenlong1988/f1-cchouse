<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraineesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('trainees', function (Blueprint $table) {
      $table->string('id', 36)->primary();
      $table->string('first_name', 30);
      $table->string('last_name', 30);
      $table->unsignedInteger('birthday');
      $table->tinyInteger('sex', FALSE, TRUE)->default(0);
      $table->string('address_line1', 50);
      $table->string('address_line2', 50);
      $table->string('note');

      $table->unsignedInteger('created_at');
      $table->unsignedInteger('updated_at');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('trainees');
  }
}
