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
            'name' => 'lodi_admin',
            'email' => 'lodi_admin@gmail.com',
            'password' => bcrypt('#Admin123#'),
            'is_admin' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'testing user 1',
            'email' => 'testing1@gmail.com',
            'password' => bcrypt('#testing1#'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'testing user 2',
            'email' => 'testing2@gmail.com',
            'password' => bcrypt('#testing2#'),
            'is_admin' => false,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'testing user 3',
            'email' => 'testing3@gmail.com',
            'password' => bcrypt('#testing3#'),
            'is_admin' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
