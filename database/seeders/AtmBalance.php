<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AtmsBalance;


class AtmBalance extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AtmsBalance::truncate();
        AtmsBalance::create([
            'atms_id' => 1,
            'balanced' => 50000,
        ]);
    }
}