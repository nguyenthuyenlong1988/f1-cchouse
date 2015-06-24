<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class _MkForTest extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    factory(NhaThieuNhi\User::class, 'admin')->create();
    factory(NhaThieuNhi\User::class, 'auth_user', 20)->create();

    factory(NhaThieuNhi\Post::class, 'act_news', 18)->create();
    factory(NhaThieuNhi\Subject::class, 10)->create();
    factory(NhaThieuNhi\Trainee::class, 20)->create();

    Model::reguard();
  }
}
