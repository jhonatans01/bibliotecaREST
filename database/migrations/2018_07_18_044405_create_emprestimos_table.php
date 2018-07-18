<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->dateTime('dataEmprestimo');
            $table->dateTime('dataDevolucao');
            $table->dateTime('prazo');
            $table->string('usuario', 15);
            $table->foreign('usuario')
                ->references('usuario')
                ->on('perfis')
                ->onDelete('cascade');
            $table->string('livro', 15);
            $table->foreign('livro')
                ->references('cod')
                ->on('livros')
                ->onDelete('cascade');
            $table->primary(['usuario','livro']);
            $table->softDeletes();
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
}
