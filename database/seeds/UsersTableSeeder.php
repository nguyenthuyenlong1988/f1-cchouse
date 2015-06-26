<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // First admin
    factory(NhaThieuNhi\User::class, 'admin')->create();

    // Additional admin
    \NhaThieuNhi\User::create([
      'id'             => Uuid::generate(),
      'name'           => 'Quản trị viên',
      'email'          => 'admin@local.com',
      'password'       => bcrypt('secret'),
      'remember_token' => str_random(10),
    ]);
  }
}
