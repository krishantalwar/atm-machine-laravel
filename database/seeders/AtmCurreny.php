<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AtmsCurreny;

use Illuminate\Support\Facades\DB;

class AtmCurreny extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AtmsCurreny::truncate();
        // AtmsCurreny::create([
        //     'atms_id' => 1,
        //     "amount_in_words" => "two_thousand",
        //     'two_thousand' => 5,
        //     'five_hundered' => 2,
        //     'hundred' => 10,
        //     'fifty' => 20,
        // ]);

        DB::table('atms_currenies')->insert([
            ['atms_id' => '1', 'amount_in_words' => "two_thousand", 'amount' => 2000, "qutanty_avliable" => 5],
            ['atms_id' => '1', 'amount_in_words' => "five_hundered", 'amount' => 500, "qutanty_avliable" => 2],
            ['atms_id' => '1', 'amount_in_words' => "hundred", 'amount' => 100, "qutanty_avliable" => 10],
            ['atms_id' => '1', 'amount_in_words' => "fifty", 'amount' => 50, "qutanty_avliable" => 20],
        ]);
    }
}