<?php

use Illuminate\Database\Seeder;

class IdolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('idols')->insert([
            'dob' => '1995-11-12T06:34:44Z',
            'name' => 'My Tam',
            'img_url' => 'https://randomuser.me/api/portraits/thumb/men/65.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('idols')->insert([
            'dob' => '1985-11-12T06:34:44Z',
            'name' => 'Ung Hoang Phuc',
            'img_url' => 'https://randomuser.me/api/portraits/thumb/men/62.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('idols')->insert([
            'dob' => '1986-11-12T06:34:44Z',
            'name' => 'Truong Giang',
            'img_url' => 'https://randomuser.me/api/portraits/thumb/men/69.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
