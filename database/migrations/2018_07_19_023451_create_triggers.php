<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER inserirEmprestimo BEFORE INSERT ON `emprestimos`
        FOR EACH ROW
        BEGIN
            DECLARE count_empr integer;
            DECLARE situ enum(\'ativo\', \'inativo\');
        
            SET @count_empr := (SELECT COUNT(*) as count_empr FROM `emprestimos` WHERE usuario=NEW.usuario AND dataDevolucao IS NULL);
            SET @situPerfil := (SELECT situacao FROM `perfis` WHERE usuario = NEW.usuario);
            SET @situLivro := (SELECT id FROM `emprestimos` WHERE livro = NEW.livro AND dataDevolucao IS NULL);
            
            IF (@count_empr >= 3 OR @situPerfil = \'inativo\' OR @situLivro IS NOT NULL)
            THEN
                SET NEW.usuario = NULL;
            ELSE
                SET NEW.prazo = current_timestamp + interval \'15\' day;
            END IF;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `inserirEmprestimo`');
    }
}
