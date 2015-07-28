<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostTaxonomyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_taxonomy', function (Blueprint $table) {
            $table->unsignedBigInteger('object_id')->default(0);
            $table->foreign('object_id')->references('id')->on('posts')->onDelete('cascade');

            $table->unsignedBigInteger('term_taxonomy_id')->default(0);
            $table->foreign('term_taxonomy_id')->references('id')->on('term_taxonomy')->onDelete('cascade');

            $table->integer('term_order')->default(0);

            $table->primary(['object_id', 'term_taxonomy_id']);
            $table->index('term_taxonomy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_taxonomy');
    }
}
