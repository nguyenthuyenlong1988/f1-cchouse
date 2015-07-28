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

        $this->_createDefaultPost();

        $this->_createAdmin();

        $this->_createSpUser();

        $this->call(DataSeeder::class);

        Model::reguard();
    }

    private function _createDefaultPost()
    {
        $title = 'Bài viết đầu tiên';

        NhaThieuNhi\Post::create([
            'post_author'  => '',
            // post_date => handled by trigger
            'post_type'    => 'post',
            'post_title'   => $title,
            'post_excerpt' => 'Hãy cập nhật thêm bài viết trong Hệ thống Quản lý.',
            'post_content' => 'Hãy cập nhật thêm bài viết trong Hệ thống Quản lý.',
            'post_name'    => str_slug($title, '-'),
            'post_avatar'  => '',
        ])
                        ->taxonomy()
                        ->attach(1); // attach default taxonomy 'uncategorized';
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
