<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    // tai khoan mac dinh cho admin dang nhap vao trang quan ly sinh vien
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admindeptrai'), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
