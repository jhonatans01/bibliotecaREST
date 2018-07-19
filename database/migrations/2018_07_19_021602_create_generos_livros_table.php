<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerosLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generos_livros', function (Blueprint $table) {
            $table->string('livro', 15);
            $table->foreign('livro')->references('cod')
                ->on('livros')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('genero')->unsigned();
            $table->foreign('genero')->references('id')
                ->on('generos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(['livro', 'genero']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generos_livros');
    }
}
