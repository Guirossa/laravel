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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('contato_id')->unsigned();
            $table->foreign('contato_id')->references('id')->on('contatos');

            $table->unsignedBigInteger('livro_id')->unsigned();
            $table->foreign('livro_id')->references('id')->on('livros');

            $table->dateTime('datahora');
            $table->dateTime('datadevolucao');
            $table->text('obs');
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
        Schema::dropIfExists('emprestimos');
    }
};
