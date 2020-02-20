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
        DB::table('users')->insert([
            'name' => 'sylvain',
            'email' => 'langlersylvain@gmail.com',
            'password' => bcrypt('sylvain1234')
        ]);

        DB::table('users')->insert([
            'name' => 'rudy',
            'email' => 'anthoinerudy@gmail.com',
            'password' => bcrypt('rudy1234')
        ]);

        DB::table('users')->insert([
            'name' => 'peterson',
            'email' => 'petersonrostain@gmail.com',
            'password' => bcrypt('peterson1234')
        ]);
    }
}
