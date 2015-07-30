<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('term_name', 200)->default('');
            $table->string('term_slug', 191)->default(''); // length = 191 is max for unique key in MYSQL.
            $table->bigInteger('term_group')->default(0);

            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');
            $table->unsignedInteger('deleted_at')->nullable();

            $table->index('term_name');
            $table->unique('term_slug');
        });

        // add column
//        DB::statement('ALTER TABLE ' . DB::getTablePrefix() . "terms ADD term_name VARCHAR(200) NOT NULL DEFAULT '' COLLATE utf8mb4_unicode_ci AFTER id");
//        DB::statement('ALTER TABLE ' . DB::getTablePrefix() . "terms ADD term_slug VARCHAR(200) NOT NULL DEFAULT '' COLLATE utf8mb4_unicode_ci");
//        DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'terms ADD term_group BIGINT(10) NOT NULL DEFAULT 0');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('terms');
    }
}
