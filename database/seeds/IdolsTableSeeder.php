<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class IdolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('pages')->insertGetId([ 
            'key' => Str::random(),           
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('idols')->insert([
            'dob' => date('Y-m-d', strtotime ('1995-11-12T06:34:44Z')),
            'name' => 'My Tam',
            'img_url' => 'https://randomuser.me/api/portraits/thumb/men/65.jpg',
            'page_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $id = DB::table('pages')->insertGetId([
            'key' => Str::random(),     
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('idols')->insert([
            'dob' => date('Y-m-d', strtotime ('1985-11-12T06:34:44Z')),
            'name' => 'Ung Hoang Phuc',
            'img_url' => 'https://randomuser.me/api/portraits/thumb/men/62.jpg',
            'page_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $id = DB::table('pages')->insertGetId([
            'key' => Str::random(),          
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('idols')->insert([
            'dob' => date('Y-m-d', strtotime ('1986-11-12T06:34:44Z')),
            'name' => 'Truong Giang',
            'img_url' => 'https://randomuser.me/api/portraits/thumb/men/69.jpg',
            'page_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
