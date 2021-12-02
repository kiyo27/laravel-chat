<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'john',
            'email' => 'john@example.com',
            'password' => Hash::make('Sample1234')
        ]);
        
        DB::table('users')->insert([
            'name' => 'fled',
            'email' => 'fled@example.com',
            'password' => Hash::make('Sample1234')
        ]);
    }
}
