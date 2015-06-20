<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->increments('id');
      $table->string('post_author', 36);
      $table->unsignedInteger('post_date');
      $table->string('post_type', 20);
      $table->string('post_status', 20);
      $table->text('post_title');
      $table->text('post_excerpt');
      $table->longText('post_content');
      $table->string('post_name', 200);

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
    Schema::drop('posts');
  }
}
