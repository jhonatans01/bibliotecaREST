<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Genero;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->delete();

        $generos = [
            ['id' => '1', 'titulo' => 'Ciência da Computação'],
            ['id' => '2', 'titulo' => 'Matemática']
        ];

        Genero::insert($generos);
    }
}
