<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        User::create([
            'name' => "user",
            "email" => "user@gmail.com",
            'account_no' => Str::random(10),
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => "user",
            "email" => "admin@gmail.com",
            "user_type" => "admin",
            // 'account_no' => Str::random(10),
            'password' => Hash::make('passwords'),
        ]);
    }
}