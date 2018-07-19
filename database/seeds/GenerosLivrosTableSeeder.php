<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosLivrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos_livros')->delete();

        $gl= [
            ['livro' => 'A1', 'genero' => '1'],
            ['livro' => 'A2.1', 'genero' => '1'],
            ['livro' => 'A2.2', 'genero' => '1'],
            ['livro' => 'A3', 'genero' => '1'],
            ['livro' => 'A4', 'genero' => '1'],
            ['livro' => 'A5', 'genero' => '2']
        ];

        DB::table('generos_livros')->insert($gl);
    }
}
