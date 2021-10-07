<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Conselhos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conselhos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lat');
            $table->string('lon');
            $table->string('email');
            $table->string('nome');
            $table->string('tel');
            $table->text('endereco');

            $table->foreignId('responsaveis_conselhos_id')
            ->references('id')
            ->on('responsaveis_conselhos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conselhos');
    }
}
