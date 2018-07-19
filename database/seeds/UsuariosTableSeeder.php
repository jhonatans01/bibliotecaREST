<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Usuario;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->delete();

        $usuarios = [
            ['matricula' => '20180101', 'email' => 'jhonatan@email.com', 'senha' => bcrypt('123')],
            ['matricula' => '20180102', 'email' => 'usuario1@email.com', 'senha' => bcrypt('456')],
            ['matricula' => '20120101', 'email' => 'usuario2@email.com', 'senha' => bcrypt('789')]
        ];

        Usuario::insert($usuarios);
    }
}
