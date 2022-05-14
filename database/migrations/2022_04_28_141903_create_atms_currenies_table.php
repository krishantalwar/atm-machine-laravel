<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atms_currenies', function (Blueprint $table) {
            $table->id();
            $table->string('atms_id');
            $table->string('amount_in_words');
            $table->string('amount');
            $table->string('qutanty_avliable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atms_currenies');
    }
};