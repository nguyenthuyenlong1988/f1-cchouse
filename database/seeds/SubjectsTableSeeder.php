<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //DB::table('subject')->insert(['id' => Uuid::generate(), 'name' => str_random(12)]);
    factory(ThieuNhiGoVap\Subject::class, 10)->create();
  }
}
