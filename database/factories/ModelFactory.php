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
        'name'           => 'Quản trị viên',
        'email'          => 'quanly@nhathieunhigovap.com',
        'password'       => bcrypt('*secret345#'),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(NhaThieuNhi\User::class, 'demo_user', function ($faker) {
    return [
        'id'             => Uuid::generate(),
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => bcrypt('demo'),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(NhaThieuNhi\User::class, 'special', function () {
    return [
        'id'             => Uuid::generate(),
        'name'           => 'Special User',
        'email'          => 'billytien@hva.io',
        'password'       => bcrypt('@Ssecret*979#'),
        'remember_token' => str_random(10),
    ];
});

// Term Taxonomy model

$factory->define(NhaThieuNhi\TermTaxonomy::class, function ($faker) {
    return [
        'term_id'     => 1,
        'taxonomy'    => 'category',
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

$factory->defineAs(NhaThieuNhi\Post::class, 'demo_post', function ($faker) {
    $title = $faker->sentence(6);
    $name  = str_slug($title, '-');

    return [
        'post_author'  => '',
        // post_date => handled by trigger
        'post_type'    => 'post',
        'post_title'   => $title,
        'post_excerpt' => $faker->text(rand(150, 300)),
        'post_content' => $faker->text(rand(1000, 2000)),
        'post_name'    => $name,
        'post_avatar'  => '',
    ];
});
