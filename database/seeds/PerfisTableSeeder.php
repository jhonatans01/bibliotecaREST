<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfis')->delete();

        $perfis = [
            ['usuario' => '20180101', 'nome' => 'Jhonatan Silva', 'cpf' => '01000000000', 'situacao' => 'ativo'],
            ['usuario' => '20180102', 'nome' => 'User1', 'cpf' => '10000000000', 'situacao' => 'ativo'],
            ['usuario' => '20120101', 'nome' => 'User2', 'cpf' => '00100000000', 'situacao' => 'inativo']
        ];

        DB::table('perfis')->insert($perfis);
    }
}
