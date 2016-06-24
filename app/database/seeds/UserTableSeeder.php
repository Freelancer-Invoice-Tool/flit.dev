<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $post = new User();
        $post->email = 'kriscates81@gmail.com';
        $post->first_name = 'Kristen';
        $post->last_name = 'Cates';
        $post->password = $_ENV['USER_PASSWORD'];
        $post->save();

        $post = new User();
        $post->email = 'bobbiehook@msn.com';
        $post->first_name = 'Bobbie';
        $post->last_name = 'O\'Connor';
        $post->password = $_ENV['USER_PASSWORD'];
        $post->save();

        $post = new User();
        $post->email = 'alaurit@gmail.com';
        $post->first_name = 'Alan';
        $post->last_name = 'Lauritzen';
        $post->password = $_ENV['USER_PASSWORD'];
        $post->save();
    }
}