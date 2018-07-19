<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Livro;

class LivrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livros')->delete();

        $livros = [
            ['cod' => 'A1', 'codGeral' => 'A1', 'titulo' => 'Fundamentos de Sistemas de Informação',
                'paginas' => '312', 'edicao' => '1', 'ano' => '2014', 'idioma' => '1'],
            ['cod' => 'A2.1', 'codGeral' => 'A2', 'titulo' => 'Algoritmos: Teoria e Prática',
                'paginas' => '944', 'edicao' => '3', 'ano' => '2012', 'idioma' => '1'],
            ['cod' => 'A2.2', 'codGeral' => 'A2', 'titulo' => 'Algoritmos: Teoria e Prática',
                'paginas' => '944', 'edicao' => '3', 'ano' => '2012', 'idioma' => '2'],
            ['cod' => 'A3', 'codGeral' => 'A3', 'titulo' => 'Sistemas Distribuídos: Princípios e Paradigmas',
                'paginas' => '416', 'edicao' => '2', 'ano' => '2007', 'idioma' => '1'],
            ['cod' => 'A4', 'codGeral' => 'A4', 'titulo' => 'Sistemas Operacionais Modernos',
                'paginas' => '864', 'edicao' => '4', 'ano' => '2015', 'idioma' => '1'],
            ['cod' => 'A5', 'codGeral' => 'A5', 'titulo' => 'Álgebra Linear e Suas Aplicações',
                'paginas' => '456', 'edicao' => '4', 'ano' => '2010', 'idioma' => '1']
        ];

        Livro::insert($livros);
    }
}
