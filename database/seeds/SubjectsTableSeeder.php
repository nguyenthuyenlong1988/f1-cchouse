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
    factory(NhaThieuNhi\Subject::class, 10)->create();
  }
}
