<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// User model

$factory->defineAs(NhaThieuNhi\User::class, 'admin', function () {
  return [
    'id'             => Uuid::generate(),
    'name'           => 'Administrator',
    'email'          => 'ops@hva.io',
    'password'       => bcrypt('secret'),
    'remember_token' => str_random(10),
  ];
});

$factory->defineAs(NhaThieuNhi\User::class, 'auth_user', function ($faker) {
  return [
    'id'             => Uuid::generate(),
    'name'           => $faker->name,
    'email'          => $faker->email,
    'password'       => str_random(10),
    'remember_token' => str_random(10),
  ];
});

// Subject model

$factory->define(NhaThieuNhi\Subject::class, function ($faker) {
  return [
    'id'           => uniqid_base36(TRUE),
    'subject_name' => $faker->streetName,
  ];
});

// Trainee model

$factory->define(NhaThieuNhi\Trainee::class, function ($faker) {
  return [
    'id'            => Uuid::generate(),
    'first_name'    => $faker->firstName(),
    'last_name'     => $faker->lastName(),
    'birthday'      => $faker->unixTime(1356912000),
    'sex'           => $faker->numberBetween(0, 4),
    'address_line1' => $faker->address(),
    'address_line2' => '',
    'note'          => $faker->text(rand(5, 200)),
  ];
});

// Post model

$factory->defineAs(NhaThieuNhi\Post::class, 'act_news', function ($faker) {
  return [
    'post_author'  => '',
    'post_date'    => time(),
    'post_type'    => 'act_news',
    'post_status'  => 'publish',
    'post_title'   => $faker->sentence(6),
    'post_excerpt' => $faker->text(rand(90, 150)),
    'post_content' => $faker->text(rand(1000, 2000)),
    'post_name'    => '',
  ];
});
