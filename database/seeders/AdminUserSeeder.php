<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@couponontop.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin123'),
            'remember_token' => \Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'address' => 'Hanoi, Vietnam',
            'avatar' => 'default.png',
            'role_id' => 1,
        ]);
    }
}
