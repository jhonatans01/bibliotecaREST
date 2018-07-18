<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->string('cod', 15);
            $table->string('codGeral', 15);
            $table->primary(['cod', 'codGeral']);
            $table->string('titulo', 100);
            $table->string('paginas', 5);
            $table->string('edicao', 4);
            $table->string('ano', 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
