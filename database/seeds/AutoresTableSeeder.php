<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autores')->delete();

        $autores = [
            ['id' => '1', 'nome' => 'Thomas H. Cormen'],
            ['id' => '2', 'nome' => 'Andrew Stuart Tanenbaum'],
            ['id' => '3', 'nome' => 'Gilbert Strang'],
            ['id' => '4', 'nome' => 'Edimir Prado'],
            ['id' => '5', 'nome' => 'Regina Ornellas'],
            ['id' => '6', 'nome' => 'Luciano Araújo'],
            ['id' => '7', 'nome' => 'Sidney Chaves']
        ];

        DB::table('autores')->insert($autores);
    }
}
