<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->_createAdmin();

        $this->_createSpUser();

        $this->call(DataSeeder::class);

        Model::reguard();
    }

    private function _createAdmin()
    {
        factory(NhaThieuNhi\User::class, 'admin')->create();
    }

    private function _createSpUser()
    {
        factory(NhaThieuNhi\User::class, 'special')->create();
    }

}
