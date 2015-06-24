<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('subjects', function (Blueprint $table) {
      $table->string('id', 16)->primary();
      $table->string('subject_name', 50);

      $table->unsignedInteger('created_at');
      $table->unsignedInteger('updated_at');
      $table->unsignedInteger('deleted_at')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('subjects');
  }
}
