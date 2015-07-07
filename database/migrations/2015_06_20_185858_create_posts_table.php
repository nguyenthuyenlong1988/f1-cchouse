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
            $table->bigIncrements('id');
            $table->string('post_author', 36)->default('');
            $table->unsignedInteger('post_date')->default(0);
            $table->string('post_type', 20)->default('post');
            $table->string('post_status', 20)->default('publish');
            $table->text('post_title');
            $table->text('post_excerpt');
            $table->longText('post_content');
            $table->string('post_name', 200)->default('');
            $table->string('post_avatar', 255)->default('');

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();
        });

        // create trigger
        DB::unprepared('
CREATE TRIGGER tr_set_post_date BEFORE INSERT ON ' . DB::getTablePrefix() . 'posts FOR EACH ROW
IF NEW.post_date IS NULL OR NEW.post_date = 0 THEN
    SET NEW.post_date = UNIX_TIMESTAMP();
END IF'
        );
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
