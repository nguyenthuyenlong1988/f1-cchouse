<?php

use Illuminate\Database\Seeder;

class TraineesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(ThieuNhiGoVap\Trainee::class, 20)->create();
  }
}
