<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoresLivrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autores_livros')->delete();

        $gl= [
            ['livro' => 'A1', 'autor' => '4', 'ordem' => '1'],
            ['livro' => 'A1', 'autor' => '5', 'ordem' => '2'],
            ['livro' => 'A1', 'autor' => '6', 'ordem' => '3'],
            ['livro' => 'A1', 'autor' => '7', 'ordem' => '4'],
            ['livro' => 'A2.1', 'autor' => '1', 'ordem' => '1'],
            ['livro' => 'A2.2', 'autor' => '1', 'ordem' => '1'],
            ['livro' => 'A3', 'autor' => '2', 'ordem' => '1'],
            ['livro' => 'A4', 'autor' => '2', 'ordem' => '1'],
            ['livro' => 'A5', 'autor' => '3', 'ordem' => '1']
        ];

        DB::table('autores_livros')->insert($gl);
    }
}
