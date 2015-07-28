<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('first_name', 30)->default('');
            $table->string('last_name', 30)->default('');
            $table->unsignedInteger('birthday')->default(0);
            $table->tinyInteger('sex', FALSE, TRUE)->default(0);
            $table->string('address_line1', 50)->default('');
            $table->string('address_line2', 50)->default('');
            $table->string('note')->default('');

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
        Schema::drop('trainees');
    }
}
