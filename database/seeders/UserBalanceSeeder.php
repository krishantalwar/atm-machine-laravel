<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserBalance;

class UserBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserBalance::truncate();
        UserBalance::create([
            'users_id' => 1,
            'balanced_amount' => 20000,
        ]);
    }
}