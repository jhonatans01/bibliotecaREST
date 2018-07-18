<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->string('nome', 100);
            $table->string('cpf', 11);
            $table->enum('situacao', ['ativo', 'desativado'])->default('ativo');
            $table->string('usuario', 10);
            $table->foreign('usuario')
                ->references('matricula')
                ->on('usuarios')
                ->onDelete('cascade');
            $table->primary('usuario');
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
        Schema::dropIfExists('perfis');
    }
}
