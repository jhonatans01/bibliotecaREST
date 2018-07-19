<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Idioma;

class IdiomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('idiomas')->delete();

        $idiomas = [
            ['id' => '1', 'titulo' => 'Português'],
            ['id' => '2', 'titulo' => 'Inglês']
        ];

        Idioma::insert($idiomas);
    }
}
