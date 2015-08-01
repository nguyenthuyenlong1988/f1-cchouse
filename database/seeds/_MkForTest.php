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

        $this->call(DataSeeder::class);

        $this->_createDefaultPost();

        $this->_createAdmin();

        $this->_createUsers();

        $this->_createSpUser();

        $this->_createSomethingElse();

        Model::reguard();
    }

    private function _createDefaultPost()
    {
        factory(NhaThieuNhi\Post::class, 'demo_post')
            ->create()
            ->taxonomy()
            ->attach(1); // attach default taxonomy 'uncategorized'
    }

    private function _createAdmin()
    {
        factory(NhaThieuNhi\User::class, 'admin')
            ->create()
            ->posts()
            ->save(factory(NhaThieuNhi\Post::class, 'demo_post')->make())
            ->taxonomy()
            ->attach(1);
    }

    private function _createUsers()
    {
        factory(NhaThieuNhi\User::class, 'demo_user', 5)
            ->create()
            ->each(function ($u) {
                $u->posts()
                  ->saveMany(factory(NhaThieuNhi\Post::class, 'demo_post', 2)->make())
                  ->each(function ($p) {
                      $p->taxonomy()->attach(1);
                  });
            });
    }

    private function _createSpUser()
    {
        factory(NhaThieuNhi\User::class, 'special')->create();
    }

    private function _createSomethingElse()
    {
        factory(NhaThieuNhi\Subject::class, 10)->create();
        factory(NhaThieuNhi\Trainee::class, 20)->create();
    }
}
