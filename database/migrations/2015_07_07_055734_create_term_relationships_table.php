<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTermRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_relationships', function (Blueprint $table) {
            $table->unsignedBigInteger('object_id')->default(0);
            $table->unsignedBigInteger('term_taxonomy_id')->default(0);
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
        Schema::drop('term_relationships');
    }
}
