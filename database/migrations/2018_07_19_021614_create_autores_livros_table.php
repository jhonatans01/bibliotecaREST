<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoresLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autores_livros', function (Blueprint $table) {
            $table->string('livro', 15);
            $table->foreign('livro')->references('cod')
                ->on('livros')->onDelete('cascade');

            $table->integer('autor')->unsigned();
            $table->foreign('autor')->references('id')
                ->on('autores')->onDelete('cascade');
            $table->primary(['livro', 'autor']);
            $table->tinyInteger('ordem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autores_livros');
    }
}
