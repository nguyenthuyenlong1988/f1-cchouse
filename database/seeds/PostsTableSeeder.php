<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(NhaThieuNhi\Post::class, 18)->create();
  }
}
