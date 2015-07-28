<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTermTaxonomyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_taxonomy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('term_id')->default(0);
            $table->string('taxonomy', 32)->default('');
            $table->longText('description');
            $table->unsignedBigInteger('parent')->default(0);
            $table->bigInteger('count')->default(0);

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();
        });

        // add columns
//        DB::statement('ALTER TABLE ' . DB::getTablePrefix() . "term_taxonomy ADD taxonomy VARCHAR(32) NOT NULL DEFAULT '' COLLATE utf8mb4_unicode_ci AFTER term_id");
//        DB::statement('ALTER TABLE ' . DB::getTablePrefix() . "term_taxonomy ADD description LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci AFTER taxonomy");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('term_taxonomy');
    }
}
