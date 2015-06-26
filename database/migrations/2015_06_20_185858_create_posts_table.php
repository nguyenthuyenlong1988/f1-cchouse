<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
      $table->string('post_name', 200)->default('');
      $table->string('post_avatar', 255)->default('');

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
    Schema::drop('posts');
  }
}
