<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Emprestimo;

class EmprestimosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emprestimos')->delete();

        $emprestimos = [
            ['usuario' => '20180101', 'livro' => 'A1'],
            ['usuario' => '20180101', 'livro' => 'A2.1'],
            ['usuario' => '20180101', 'livro' => 'A3']
        ];

        Emprestimo::insert($emprestimos);
    }
}
