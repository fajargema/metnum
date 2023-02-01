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
        Schema::create('simpsons', function (Blueprint $table) {
            $table->id();
            $table->double('a');
            $table->double('b');
            $table->double('h');
            $table->double('n');
            $table->double('sum');
            $table->double('luas');
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
        Schema::dropIfExists('simpsons');
    }
};
