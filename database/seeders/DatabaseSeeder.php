<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AtmBalance;
use Database\Seeders\AtmCurreny;
use Database\Seeders\AtmSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UserBalanceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AtmBalance::class,
            AtmCurreny::class,
            AtmSeeder::class,
            UserSeeder::class,
            UserBalanceSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}